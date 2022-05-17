<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcensusController extends AbstractController
{
    /**
     * @Route("/concensus", name="app_concensus")
     */
    public function index(): Response
    {
        return $this->render('concensus/index.html.twig', [
            'controller_name' => 'ConcensusController',
        ]);
    }
}
