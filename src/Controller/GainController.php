<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GainController extends AbstractController
{
    /**
     * @Route("/gain", name="app_gain")
     */
    public function index(): Response
    {
        return $this->render('gain/index.html.twig', [
            'controller_name' => 'GainController',
        ]);
    }
}
