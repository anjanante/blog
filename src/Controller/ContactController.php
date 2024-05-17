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
                'Contact from Nanté',
                'contact',
                $context
            );

            $this->addFlash('message', 'Contact e-mail sent');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'header_image' => 'assets/img/contact-bg-1.jpg',
            'header_title' => 'Contact me',
            'header_desc' => "Do you have any questions? I've got the answers",
            'form' => $form->createView()
        ]);
    }
}
