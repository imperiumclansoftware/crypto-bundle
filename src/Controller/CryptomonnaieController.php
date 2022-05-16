<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CryptomonnaieController extends AbstractController
{
    /**
     * @Route("/cryptomonnaie", name="app_cryptomonnaie")
     */
    public function index(): Response
    {
        return $this->render('cryptomonnaie/index.html.twig', [
            'controller_name' => 'CryptomonnaieController',
        ]);
    }
}
