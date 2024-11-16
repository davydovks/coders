<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoderController extends AbstractController
{
    #[Route('/coder', name: 'app_coder')]
    public function index(): Response
    {
        return $this->render('coder/index.html.twig', [
            'controller_name' => 'CoderController',
        ]);
    }
}
