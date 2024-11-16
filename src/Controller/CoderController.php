<?php

namespace App\Controller;

use App\Repository\CoderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
