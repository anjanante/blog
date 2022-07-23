<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Mail;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, Mail $mail): Response
    {
        $form = $this->createForm(ContactFormType::class);

        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $context = [
                'mail' => $contact->get('email')->getData(),
                'sujet' => $contact->get('sujet')->getData(),
                'message' => $contact->get('message')->getData(),
            ];
            $mail->send(
                $contact->get('email')->getData(),
                'rajaonaanja@gmail.com',
                'Contact depuis le site PetitesAnnonces',
                'contact',
                $context
            );

            $this->addFlash('message', 'Mail de contact envoyé');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'header_image' => 'assets/img/contact-bg-1.jpg',
            'header_title' => 'Contacter moi',
            'header_desc' => 'Avez-vous des questions? J\'ai les réponses',
            'form' => $form->createView()
        ]);
    }
}
