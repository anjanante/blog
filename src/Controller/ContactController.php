<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'header_image' => 'assets/img/contact-bg-1.jpg',
            'header_title' => 'Contacter moi',
            'header_desc' => 'Avez-vous des questions? J\'ai les réponses'
        ]);
    }
}
