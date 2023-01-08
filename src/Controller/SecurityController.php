<?php

namespace App\Controller;

use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'security_registration')]
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $encoder){  
        // le service d'ObjectManager n'est pas disponible pour cette version 
        // La classe UserPasswordHasherInterface pour encoder les passwords
        $user = new User(); // Instanciation de user
        $form = $this -> createForm(RegistrationType::class, $user); // relier les champs du formulaire à ceux du User
        $form -> handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid()) {
            $hash = $encoder -> hashPassword($user, $user -> getPassword());
            // Dans le fichier security.yaml on a preciser que si on a un User, on doit l'encoder avec l'algorithme bcrypt
            $user->setPassword($hash); //Modifie le password et met le hash en lieu et place
            $manager -> persist($user); // Faire persister le user instancier si le form est soumit et valide
            $manager -> flush(); // Sauvegarder le user dans la BD
            return $this -> redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form -> createView(),
        ]);
    }

    #[Route('/connexion', name: 'security_login')]
    public function login(){
        return $this -> render('security/login.html.twig');
    }

    #[Route('/deconnexion', name: 'security_logout')]
    public function logout(){
    }
    //La fonction ne fait rien mais c'est le composant de securité dans security.yalm qui gère la deconnexion et redirige vers l'index 
}
