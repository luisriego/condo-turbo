<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('public/main/contact.html.twig', [
            'title' => 'Contact US',
            'text' => 'Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus officia corrupti qui autem 
                        fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae possimus qui ducimus. Et 
                        voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis inventore hic culpa.',
            'page' => 'Contact',
        ]);
    }
}
