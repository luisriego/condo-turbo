<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlankPageController extends AbstractController
{
    #[Route('/admin/blankpage', name: 'blankpage')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/blank-page.html.twig', []);
    }
}
