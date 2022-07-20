<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticlesController
 * @package App\Controller
 * @Route("/actualites", name="actualites_")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles")
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        //liste de tous les articles
        $donnees = $this->getDoctrine()->getRepository(Articles::class)->findBy([], ['created_at'=>'desc']);
        // $articlesR = $ar->findAll();

        $articles = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1), //num de la page en cours, 1 by default
            4
        );
        dump($articles);
        return $this->render('articles/index.html.twig', [
            'title' => 'Liste des articles',
            'articles' => $articles,
        ]);
    }
}
