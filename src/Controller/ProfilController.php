<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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

    #[Route('/profil/{id}', name: 'app_profil', requirements: ["id" => "\d+"])]
    public function profilSupp(Request $request,int $id): Response
    {
    
        $doctrine = $this->getDoctrine();
        $em = $this->getDoctrine()->getManager();
        $posseder = $doctrine->getRepository(Posseder::class)->find($request->get('id'));
        $em->remove($posseder);
        $em->flush();
        return $this->redirectToRoute('profil');
        
    
    }
}
