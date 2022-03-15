<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Entreprise;
use App\Form\AjoutEntrepriseType;


class EntrepriseController extends AbstractController
{
    #[Route('/ajout_entreprise', name: 'ajout_entreprise')]
    public function ajoutEntreprise(): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(AjoutEntrepriseType::class, $entreprise);

        return $this->render('entreprise/ajout_entreprise.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/entreprise/{id}', name: 'entreprise')]
    public function afficheUneEntreprise(Request $request, Entreprise $entreprise): Response
    {
        


        return $this->render('entreprise/entreprise.html.twig', []);
    }
}
