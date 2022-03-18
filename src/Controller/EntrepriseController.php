<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Entreprise;
use App\Entity\User;
use App\Form\AjoutEntrepriseType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;


class EntrepriseController extends AbstractController
{
    #[Route('/ajout_entreprise', name: 'ajout_entreprise')]
    public function ajoutEntreprise(Request $request, SluggerInterface $slugger): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(AjoutEntrepriseType::class, $entreprise);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $entreprise->setEstPremium('0');
                $entreprise->setAdresseRegionE($request->get('regionE'));
                $ex = explode("-", $request->get('villecpE'));
                $entreprise->setAdresseVilleE($ex[0]);
                $entreprise->setAdresseCPE($ex[1]);

                $entreprise->setDateCréationPage(new \Datetime());

                /*
                //envoie de phohtos dans la bd
                //https://nouvelle-techno.fr/articles/live-coding-upload-dimages-multiples-avec-symfony-4-et-5

                // On récupère les images transmises
                $entreprise = $form->get('images')->getData();

                // On boucle sur les images
                foreach ($entreprise as $entreprise) {
                    // On copie le fichier dans le dossier uploads
                    $entreprise->move(
                        $this->getParameter('images_directory'),
                        $entreprise
                    );

                    // On crée l'image dans la base de données
                    $ent = new Entreprise();
                    $entreprise->setLogoEntreprise($ent);
                    $entreprise->setBanniereEntreprise($ent);
                }
                */

                
                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $em->flush();
                return $this->redirectToRoute('entreprise', array('id' => $entreprise->getId()));
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
        
        return $this->render('entreprise/entreprise.html.twig', ['entrepriseRepo'=> $entrepriseRepo,"liste"=>$liste]);
    
    }
}
