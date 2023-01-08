<?php

namespace App\Controller;

use SessionIdInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;


class FavorisController extends AbstractController
{
    #[Route('/favoris', name: 'app_favoris')]
    public function index(SessionInterface $session, PostRepository $postRepository): Response
    {
        $favoris = $session -> get('favoris',[]);
        // Récupération de tous les datas liées aux biens
        $favorisData = [];
        // Boucler sur le favoris pour remplir favorisData
        foreach ($favoris as $id => $isFavoris) {
            $favorisData[] = [
                'post' => $postRepository -> find($id),
                'isFavoris' => $isFavoris,
            ];    
        }
        $nb_biens_favoris = 0;
        foreach ($favorisData as $item) {
            $nb_biens_favoris += $item['isFavoris'];
        }   
        return $this->render('favoris/index.html.twig', [
            'items' => $favorisData,
            'nb_biens_favoris' => $nb_biens_favoris,
        ]);
    }

    #[Route("/favoris/add/{id}", name: 'favoris_add')]
    public function add($id, SessionInterface $session)
    {   
        // Recuperation de la donnée favoris dans session
        $favoris = $session -> get('favoris',[]);
        // si on a dejà un même bien dans notre liste de favoris
        // ne plus l'ajouter
        $page="";
        if (!empty($favoris[$id])) {
            $page ="non_valide";
        }else{
            $page ="validation";
        }
        $favoris[$id] = 1;
        $session ->  set('favoris',$favoris);
        return $this -> redirectToRoute($page,[
        ]);
    }

    // Suppression de biens mit en favoris
    #[Route("/favoris/remove/{id}", name: 'favoris_remove')]
    public function remove($id, SessionInterface $session){
        $favoris = $session -> get('favoris',[]);
        if(!empty($favoris[$id])){
            unset($favoris[$id]); // retiré le bien
        }
        $session -> set('favoris',$favoris);
        return $this -> redirectToRoute("app_favoris");
    }

    // Page de validation
    #[Route("/validation", name: 'validation')]
    public function validate(){
        return $this -> render("favoris/validation.html.twig");
    }

    // Page de non validation
    #[Route("/no_valide", name: 'non_valide')]
    public function noValidate(){
        return $this -> render("favoris/non_valide.html.twig");
    }



}
