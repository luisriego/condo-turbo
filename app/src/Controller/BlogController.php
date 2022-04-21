<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog-grid', name: 'blog-grid')]
    public function index(): Response
    {
        return $this->render('main/blog-grid.html.twig', [
            'title' => 'Our Amazing Posts',
            'text' => 'Grid News',
            'page' => 'News Grid',
        ]);
    }
}
