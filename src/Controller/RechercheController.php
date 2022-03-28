<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\RechercheUtilisateurType;



class RechercheController extends AbstractController
{
    #[Route('/recherche-utilisateur', name: 'recherche-utilisateur')]
    public function rechercheUtilisateur(Request $request): Response
    {

        $form = $this->createForm(RechercheUtilisateurType::class);

        if ($request->isMethod('POST')) {
            if ($form->isSubmitted() && $form->isValid()) {

            }
        }

        return $this->render('recherche/recherche-utilisateur.html.twig', ["form"=>$form->createView()]);
    }
}
