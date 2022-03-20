<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


use App\Entity\User;
use App\Entity\Profil;
use App\Entity\Posseder;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function profil(Request $request): Response
    {
    
        $doctrine = $this->getDoctrine();
        $em = $this->getDoctrine()->getManager();


        if($request->get('id') != null){
            $posseder = $doctrine->getRepository(Posseder::class)->find($request->get('id'));
            dd($posseder);
            $em->remove($posseder);
            $em->flush();
            return $this->redirectToRoute('profil');
        }

        

        $repoPosseder = $doctrine->getRepository(Posseder::class);
        $posseder = $repoPosseder->findAll();
        dd($posseder);
        
        return $this->render('profil/profil.html.twig', [
            'posseder' => $posseder
        ]);
    }
}
