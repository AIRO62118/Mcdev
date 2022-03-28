<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\AjoutCompetenceType;
use App\Form\AjoutDomaineType;


use App\Entity\User;
use App\Entity\Profil;
use App\Entity\Posseder;
use App\Entity\Competence;
use App\Entity\Domaine;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function profil(): Response
    {
    
        $doctrine = $this->getDoctrine();
        $id = $this->getUser()->getId();
        
        
        $repoPosseder = $doctrine->getRepository(Posseder::class)->findBy(array('user'=>$id),array());
        
        
        
        
        return $this->render('profil/profil.html.twig', [
            'posseder' => $repoPosseder
        ]);
    }

    #[Route('/profilSupp/{id}', name: 'app_profilSupp', requirements: ["id" => "\d+"])]
    public function profilSupp(Request $request,int $id): Response
    {
    
        $doctrine = $this->getDoctrine();
        $em = $this->getDoctrine()->getManager();
        $posseder = $doctrine->getRepository(Posseder::class)->find($request->get('id'));
        $em->remove($posseder);
        $em->flush();
        return $this->redirectToRoute('app_profil');
    }

    #[Route('/profilAdd', name: 'app_profilAdd')]
    public function profilAdd(Request $request): Response
    {
        $competence = new Competence();
        $form = $this->createForm(AjoutCompetenceType::class, $competence);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($competence);
                $em->flush();
                return $this->redirectToRoute('app_profil');
            }
        }
       

        return $this->render('profil/ajoutcompetence.html.twig', [
            'form'=>$form->createView()
        ]);
    } 

    #[Route('/profilAddDomaine', name: 'app_profilAddDomaine')]
    public function profilAddDomaine(Request $request): Response
    {
        $domaine = new Domaine();
        $form = $this->createForm(AjoutDomaineType::class, $domaine);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($domaine);
                $em->flush();
                return $this->redirectToRoute('app_profil');
            }
        }
       

        return $this->render('profil/ajoutDomaine.html.twig', [
            'form'=>$form->createView()
        ]);
    } 
}

