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
    public function ajoutEntreprise(Request $request): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(AjoutEntrepriseType::class, $entreprise);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entreprise->setAdresseRegionE($request->get('regionE'));
                $ex = explode("-",$request->get('villecpE'));
                $entreprise->setAdresseVilleE($ex[0]);
                $entreprise->setAdresseCPE($ex[1]);

                $entreprise->setDateCréationPage(new \Datetime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $em->flush();
                return $this->redirectToRoute('ajout_entreprise');
            }

            return $this->redirectToRoute('ajout_entreprise');
        }



        return $this->render('entreprise/ajout_entreprise.html.twig', ['ajoutEntrepriseForm' => $form->createView()]);
    }



    #[Route('/entreprise/{id}', name: 'entreprise')]
    public function afficheUneEntreprise(Request $request, Entreprise $entreprise): Response
    {

        $entrepriseRepo = $this->getDoctrine()->getRepository(Entreprise::class)->find($entreprise->getId());
        

        return $this->render('entreprise/entreprise.html.twig', ['entrepriseRepo'=> $entrepriseRepo]);
    }
}
