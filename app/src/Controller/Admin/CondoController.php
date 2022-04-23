<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CondoController extends AbstractController
{
    #[Route('/admin/condo', name: 'condo-profile')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/condo-profile.html.twig', []);
    }
}
