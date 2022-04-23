<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        return $this->render('public/main/about.html.twig', [
            'title' => 'We Do Great Things For Creative Folks',
            'text' => '',
            'page' => 'About',
        ]);
    }
}
