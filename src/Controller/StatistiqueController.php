<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Rechercher;
use App\Entity\Posseder;

class StatistiqueController extends AbstractController
{
    #[Route('/statistique', name: 'app_statistique')]
    public function index(): Response
    {

        $doctrine = $this->getDoctrine();
        $id = $this->getUser()->getId();
        
        
        $repoPosseder = $doctrine->getRepository(Posseder::class)->findBy(array('user'=>$id),array());
        $repoRechercher = $doctrine->getRepository(Rechercher::class)->findBy(array(),array('salaire'=>"ASC"),10);
        $test = $doctrine->getRepository(Rechercher::class)->moyenneRecherche();
       // $test2 = $doctrine->getRepository(Rechercher::class)->nbRecherche_en_un_mois();
        
        

        return $this->render('statistique/index.html.twig', [
            'rechercher'=>$repoRechercher, 'test'=>$test
        ]);
    }
}
