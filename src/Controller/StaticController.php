<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
 
use App\Entity\Contact;
use App\Form\ContactType;



class StaticController extends AbstractController
{

    #[Route('/accueil', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('static/accueil.html.twig', []);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){   
                $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('fkarbowysio@gmail.com')
                ->subject($contact->getSujet())
                ->htmlTemplate('emails/email-contact.html.twig')
                ->context([
                    'nom'=> $contact->getNom(),
                    'sujet'=> $contact->getSujet(),
                    'message'=> $contact->getMessage()
                ]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
              
                $mailer->send($email);
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('contact');
            }
        } 
        return $this->render('static/contact.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/mentions-legales', name: 'mentions-legales')]
    public function mentions_legales(): Response
    {
    return $this->render('static/mentions-legales.html.twig', []);
    }

    #[Route('/a-propos', name: 'a-propos')]
    public function a_propos(): Response
    {
    return $this->render('static/a-propos.html.twig', []);
}
}
