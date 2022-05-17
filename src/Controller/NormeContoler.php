<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NormeController extends AbstractController
{
    /**
     * @Route("/norme", name="app_norme")
     */
    public function index(): Response
    {
        return $this->render('norme/index.html.twig', [
            'controller_name' => 'NormeController',
        ]);
    }
}
