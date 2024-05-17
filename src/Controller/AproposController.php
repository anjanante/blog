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
            'header_title' => 'About me',
            'header_desc'  => "To evolve in life, don't stop learning",
        ]);
    }
}
