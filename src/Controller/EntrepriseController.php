<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Entreprise;
use App\Entity\User;
use App\Entity\Rechercher;


use App\Form\AjoutEntrepriseType;
use App\Form\DemandeCompetenceType;



class EntrepriseController extends AbstractController
{
    #[Route('/ajout_entreprise', name: 'ajout_entreprise')]
    public function ajoutEntreprise(Request $request): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(AjoutEntrepriseType::class, $entreprise);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entreprise->setEstPremium('0');
                $entreprise->setAdresseRegionE($request->get('regionE'));
                $ex = explode("-",$request->get('villecpE'));
                $entreprise->setAdresseVilleE($ex[0]);
                $entreprise->setAdresseCPE($ex[1]);

                $entreprise->setDateCréationPage(new \Datetime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $user = $this->getUser()->setEstPatron($entreprise);
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('entreprise',array('id'=>$entreprise->getId()));
            }

            return $this->redirectToRoute('entreprise/{id}');
        }



        return $this->render('entreprise/ajout_entreprise.html.twig', ['ajoutEntrepriseForm' => $form->createView()]);
    }



    #[Route('/entreprise/{id}', name: 'entreprise')]
    public function afficheUneEntreprise(Request $request, Entreprise $entreprise): Response
    {

        $entrepriseRepo = $this->getDoctrine()->getRepository(Entreprise::class)->find($entreprise->getId());
        //affiche les employer en fonction de l'entreprise
        $liste = $this->getDoctrine()->getRepository(User::class)->users($entreprise->getId());

        $rechercher = new Rechercher();
        $form = $this->createForm(DemandeCompetenceType::class, $rechercher);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $rechercher->setEntreprise($entreprise);

                $em = $this->getDoctrine()->getManager();
                $em->persist($rechercher);
                $em->flush();
            }


        return $this->render('entreprise/profil-entreprise.html.twig', ['entrepriseRepo'=> $entrepriseRepo,"liste"=>$liste,"form"=>$form->createView()]);
    }
}
}