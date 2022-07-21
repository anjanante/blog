<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        //liste de tous les articles
        $donnees = $this->getDoctrine()->getRepository(Articles::class)->findBy([], ['created_at'=>'desc']);

        $articles = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1), //num de la page en cours, 1 by default
            4
        );
     
        return $this->render('home/index.html.twig', [
            'header_image' => 'assets/img/home-bg-1.jpg',
            'header_title' => 'Clean Blog',
            'header_desc' => 'Un Blog d\'autoformation symfony',
            'articles' => $articles,
        ]);
    }
}
