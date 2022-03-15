<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function profil(): Response
    {
        //affiche les employer en fonction de l'entreprise
        $liste = $this->getDoctrine()->getRepository(User::class)->users(5);
        return $this->render('profil/profil.html.twig', ["liste"=>$liste]);
    }
}
