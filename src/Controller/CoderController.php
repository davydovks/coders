<?php

namespace App\Controller;

use App\Form\CoderType;
use App\Repository\CoderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoderController extends AbstractController
{
    #[Route('/coder', name: 'coder_index')]
    public function index(CoderRepository $coderRepository): Response
    {
        return $this->render('coder/index.html.twig', [
            'coders' => $coderRepository->findAll(),
        ]);
    }

    #[Route('/coder/new', name: 'coder_new')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(CoderType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coder = $form->getData();
            $entityManager->persist($coder);
            $entityManager->flush();

            return $this->redirectToRoute('coder_index');
        }

        return $this->render('coder/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/coder/{id}/edit', name: 'coder_edit')]
    public function edit(
        CoderRepository $coderRepository,
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $coder = $coderRepository->find($id);
        $form = $this->createForm(CoderType::class, $coder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coder = $form->getData();
            $entityManager->persist($coder);
            $entityManager->flush();

            return $this->redirectToRoute('coder_index');
        }

        return $this->render('coder/edit.html.twig', [
            'coder' => $coder,
            'form' => $form
        ]);
    }
}
