<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{

    #[Route('/accueil', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('static/accueil.html.twig', []);
    }

     #[Route('/connexion', name: 'connexion')]
     public function connexion(): Response
     {
         return $this->render('login/connexion.html.twig', []);
     }

      #[Route('/inscription', name: 'inscription')]
    public function inscription(): Response
    {
        return $this->render('login/inscription.html.twig', []);
    }

     #[Route('/paiement', name: 'paiement')]
     public function paiement(): Response
     {
         return $this->render('static/paiement.html.twig', []);
     }

      #[Route('/profil', name: 'profil')]
    public function profil(): Response
    {
        return $this->render('profil/profil.html.twig', []);
    }

     #[Route('/recherche', name: 'recherche')]
     public function recherche(): Response
     {
         return $this->render('static/recherche.html.twig', []);
     }

}
