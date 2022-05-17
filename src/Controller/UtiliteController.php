<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtiliteController extends AbstractController
{
    /**
     * @Route("/utilite", name="app_utilite")
     */
    public function index(): Response
    {
        return $this->render('Utilite/index.html.twig', [
            'controller_name' => 'UtiliteController',
        ]);
    }
}
