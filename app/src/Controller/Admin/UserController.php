<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/admin/user-profile', name: 'user-profile')]
    public function index(): Response
    {
        return $this->render('admin/user/user-profile.html.twig', [
            'title' => 'User Profile'
        ]);
    }
}
