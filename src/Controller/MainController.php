<?php

namespace App\Controller;

use App\Repository\CoderRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/stats', name: 'stats')]
    public function stats(
        CoderRepository $coderRepository,
        ProjectRepository $projectRepository
    ): Response {
        return $this->render('main/stats.html.twig', [
            'coders_count' => $coderRepository->count(),
            'projects_count' => $projectRepository->count(),
            'average_age' => $coderRepository->avgAge(),
        ]);
    }
}
