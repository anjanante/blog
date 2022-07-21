<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AproposController extends AbstractController
{
    /**
     * @Route("/apropos", name="apropos")
     */
    public function index(): Response
    {
        return $this->render('apropos/index.html.twig', [
            'header_image' => 'assets/img/about-bg-1.jpg',
            'header_title' => 'A propos de moi',
            'header_desc' => 'Pour évoluer dans la vie, n\'arrête pas d\'apprendre',
        ]);
    }
}
