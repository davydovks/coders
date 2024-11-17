<?php

namespace App\Controller;

use App\Form\ProjectType;
use App\Repository\CoderRepository;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'project_index')]
    public function index(
        CoderRepository $coderRepository,
        ProjectRepository $projectRepository,
    ): Response {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
            'activeCoders' => $coderRepository->findAllActive(),
        ]);
    }

    #[Route('/project/new', name: 'project_new')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
    ): Response {
        $form = $this->createForm(projectType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $project = $form->getData();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/project/{id}/edit', name: 'project_edit')]
    public function edit(
        ProjectRepository $projectRepository,
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $project = $projectRepository->find($id);
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $project = $form->getData();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/edit.html.twig', [
            'project' => $project,
            'form' => $form
        ]);
    }
}
