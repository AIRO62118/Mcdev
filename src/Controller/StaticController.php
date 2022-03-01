<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('static/index.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }

    #[Route('/accueil', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('static/accueil.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }

    #[Route('/contact', name: 'contact')] // étape 1
    public function contact(): Response // étape 2
    {
        return $this->render('static/contact.html.twig', [ // étape 3
            
        ]);
    }
}
