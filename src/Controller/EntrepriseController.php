<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Entreprise;
use App\Entity\User;
use App\Entity\Rechercher;
use App\Entity\Interesser;
use Symfony\Component\Finder\Finder;

use App\Form\AjoutEntrepriseType;
use App\Form\DemandeCompetenceType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;



class EntrepriseController extends AbstractController
{
    #[Route('/ajout_entreprise', name: 'ajout_entreprise')]
    public function ajoutEntreprise(Request $request, SluggerInterface $slugger): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(AjoutEntrepriseType::class, $entreprise);
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $entreprise->setEstPremium('0');
                $entreprise->setAdresseRegionE($request->get('regionE'));
                //explode() — Coupe une chaîne en segments / comme un substring
                $ex = explode("-", $request->get('villecpE'));
                $entreprise->setAdresseVilleE($ex[0]);
                $entreprise->setAdresseCPE($ex[1]);
                $entreprise->setDateCréationPage(new \Datetime());

                $banniere = $form->get('banniere_entreprise')->getData();
                $nomBanniere = md5(uniqid());

                try{
                    $banniere->move($this->getParameter('file_directory'), $nomBanniere);
                    $entreprise->setBanniereEntreprise($nomBanniere);
                }
                catch(\FileException $e){
                    $this->addFlash('notice','Problème d\'envoi de la bannière');

                }

                $logo = $form->get('logo_entreprise')->getData();
                $nomLogo = md5(uniqid());

                try{
                    $logo->move($this->getParameter('file_directory'), $nomLogo);
                    $entreprise->setLogoEntreprise($nomLogo);
                }
                catch(\FileException $e){
                    $this->addFlash('notice','Problème d\'envoi du logo');

                }

                $em->persist($entreprise);
                $user = $this->getUser()->setEstPatron($entreprise);
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('entreprise',array('id'=>$entreprise->getId()));
            }
        }
        return $this->renderForm('entreprise/ajout_entreprise.html.twig', ['ajoutEntrepriseForm' => $form]);
    }

    //Cette route est réalisable grâce au composer sensio/framework-extra-bundle
    #[Route('/entreprise/{id}', name: 'entreprise')]
    public function afficheUneEntreprise(Request $request, Entreprise $entreprise): Response
    {
        //Encoder en 64 les bannières et logo
        $finder = new Finder();

        $banniere = $finder->files()->in($this->getParameter('file_directory'))->name($entreprise->getBanniereEntreprise());
        foreach ($finder as $file) {
            $banniere = 'data:image/png;base64, '.base64_encode($file->getContents());
            break;
        }

        $logo = $finder->files()->in($this->getParameter('file_directory'))->name($entreprise->getLogoEntreprise());
        foreach ($finder as $file) {
            $logo = 'data:image/png;base64, '.base64_encode($file->getContents());
            break;
        }
        
        //$entrepriseRepo = $this->getDoctrine()->getRepository(Entreprise::class)->find($entreprise->getId());
        //affiche les employer en fonction de l'entreprise
        $liste = $this->getDoctrine()->getRepository(User::class)->afficheSalaries($entreprise->getId());
        $listeFavori = $this->getDoctrine()->getRepository(Interesser::class)->afficheFavori($entreprise->getId());

        $rechercher = new Rechercher();
        $form = $this->createForm(DemandeCompetenceType::class, $rechercher);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $rechercher->setEntreprise($entreprise);
                $rechercher->setDateRecherche(new \DateTime());
                $em = $this->getDoctrine()->getManager();
                $em->persist($rechercher);
                $em->flush();
            }
        }

        return $this->render('entreprise/profil-entreprise.html.twig', [
            'entreprise'=> $entreprise,
            "liste"=>$liste,
            "listeFavori"=>$listeFavori,
            "form"=>$form->createView(),
            'banniere' => $banniere,
            'logo' => $logo,
        ]);
    }

}