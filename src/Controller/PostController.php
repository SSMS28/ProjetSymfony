<?php

namespace App\Controller;
use App\Repository\PostRepository;
use App\Entity\Post;
use App\Entity\SearchTerrain;
use App\Entity\Comment;
use App\Form\PostType;
use App\Form\CommentType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;


class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     */
    public function index(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $posts = $paginator->paginate(
            $postRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    //controller catégorie terrain agricole
    /**
     * @Route("/categories/terrain", name="categorie_terrain")
     */
    public function terrain(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $posts = $paginator->paginate(
            $postRepository->findBy(['categorie' => 'Terrain agricole']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('categories/terrain.html.twig', [
            'posts' => $posts
        ]);
    }

    // controller pour page catégorie prairie
    /**
     * @Route("/categories/prairie", name="categorie_prairie")
     */
    public function prairie(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $posts = $paginator->paginate(
            $postRepository->findBy(['categorie' => 'Prairie']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('categories/prairie.html.twig', [
            'posts' => $posts
        ]);
    }

    // controller pour page catégorie bois
    /**
     * @Route("/categories/bois", name="categorie_bois")
     */
    public function bois(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $posts = $paginator->paginate(
            $postRepository->findBy(['categorie' => 'Bois']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('categories/bois.html.twig', [
            'posts' => $posts
        ]);
    }

    // controller pour page catégorie batiment
    /**
     * @Route("/categories/batiment", name="categorie_batiment")
     */
    public function batiment(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $posts = $paginator->paginate(
            $postRepository->findBy(['categorie' => 'Batiments']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('categories/batiment.html.twig', [
            'posts' => $posts
        ]);
    }

    // controller pour page catégorie exploitation
    /**
     * @Route("/categories/exploitation", name="categorie_exploitation")
     */
    public function exploitation(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {   
        $posts = $paginator->paginate(
            $postRepository->findBy(['categorie' => 'Exploitations']), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('categories/exploitations.html.twig', [
            'posts' => $posts
        ]);
    }

    // /**
    //  * @Route("/categories/search/partials/terrainData", name="categorie_terrain_data")
    //  */
    // public function terrain(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    // {   
    //     $posts = $paginator->paginate(
    //         $postRepository->findBy(['categorie' => 'Terrain agricole']), /* query NOT result */
    //         $request->query->getInt('page', 1), /*page number*/
    //         5 /*limit per page*/
    //     );
    //     return $this->render('categories/search/partials/terrainData.html.twig', [
    //         'posts' => $posts
    //     ]);
    // }

    // private $repoSearchTerrain;
    // public function __construct(PostRepository $repoSearchTerrain){
    //     $this -> repoSearchTerrain = $repoSearchTerrain;
    // }
    // /**
    //  * @Route("/categories/terrain", name="categorie_terrain")
    //  */
    // public function SearchTerrain(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    // {   
    //     // Show only the Terrain agrocole
    //     $posts = $paginator->paginate(
    //         $postRepository->findBy(['categorie' => 'Terrain agricole']), /* query NOT result */
    //         $request->query->getInt('page', 1), /*page number*/
    //         5 /*limit per page*/
    //     );

    //     //Form empty
    //     $search = new SearchTerrain(); // Entity sans enregistrement dans la BD
    //     $form = $this -> createForm(SearchTerrainType::class, $search);

    //     // Then form is submited
    //     $form -> handleRequest($request);
    //     if($form -> isSubmitted() && $form -> isValid()){
    //         $terrain = $this -> repoSearchTerrain -> findTerrain($search);
    //     }

    //     return $this->render('categories/terrain.html.twig', [
    //         'controller_name'=> 'PostController',
    //         'posts' => $posts,
    //         'search' => $form -> createView()
    //     ]);
    // }



    /**
     * @Route("/post/new",name="post_new")
     */
    public function create(Request $request, PersistenceManagerRegistry $doctrine)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $entityManager = $doctrine() ->getManager();
                $entityManager->persist($post);
                $entityManager->flush();
                $this->addFlash(
                    'success',
                    'Your post was added'
                );

            return $this->redirectToRoute('post');
        }

        return $this->render('post/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function show(Request $request , PostRepository $postRepository)
    {
        $postId = $request->attributes->get('id');
        $post = $postRepository->find($postId);

        //$comment = new Comment();
        //$commentForm = $this->createForm(CommentType::class, $comment);
        //$commentForm->handleRequest($request);
        //$this->addComment($commentForm, $comment, $post);
        return $this->render('post/show.html.twig' , [
            'post' => $post,
            //'commentForm'=> $commentForm->createView()
        ]);
    }
    /**
     * @Route("/post/{id}/edit" , name="post_edit")
     */
    public function edit(Post $post, Request $request,PersistenceManagerRegistry $doctrine)
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $doctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush(); 
            $this->addFlash(
                'success',
                'Your post was edited'
            ); 
            return $this->redirectToRoute('post_show' , ['id' => $post->getId()]);
        }
        return $this->render('/post/edit.html.twig',[
            'post'=>$post,
            'editForm' => $form->createView()
        ]);
    }
    //Add comment 
    private function addComment($commentForm, $comment, $post,PersistenceManagerRegistry $doctrine)
    {
        if($commentForm->isSubmitted() && $commentForm->isValid())
        {
            $comment->setCreatedAt(new \DateTimeImmutable());
            $comment->setPost($post);
            $entityManager = $doctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush(); 
            $this->addFlash(
                'success',
                'Your comment was added'
            ); 
            return $this->redirectToRoute('post_show' , ['id' => $post->getId()]);
        }
    }
    
}
