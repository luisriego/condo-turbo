<?php

namespace App\Controller;

use App\Entity\Condo;
use App\Form\Condo1Type;
use App\Form\CondoType;
use App\Repository\CondoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/condo')]
class CondoController extends AbstractController
{
    #[Route('/', name: 'condo_index', methods: ['GET'])]
    public function index(CondoRepository $condoRepository): Response
    {
        return $this->render('condo/index.html.twig', [
            'condos' => $condoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'condo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $condo = new Condo();
        $form = $this->createForm(CondoType::class, $condo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($condo);
            $entityManager->flush();

            return $this->redirectToRoute('condo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('condo/new.html.twig', [
            'condo' => $condo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'condo_show', methods: ['GET'])]
    public function show(Condo $condo): Response
    {
        return $this->render('condo/show.html.twig', [
            'condo' => $condo,
        ]);
    }

    #[Route('/{id}/edit', name: 'condo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Condo $condo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Condo1Type::class, $condo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('condo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('condo/edit.html.twig', [
            'condo' => $condo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'condo_delete', methods: ['POST'])]
    public function delete(Request $request, Condo $condo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$condo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($condo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('condo_index', [], Response::HTTP_SEE_OTHER);
    }
}
