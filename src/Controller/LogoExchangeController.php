<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogoExchangeController extends AbstractController
{
    /**
     * @Route("/logoExchange", name="app_logo_exchange")
     */
    public function index(): Response
    {
        return $this->render('Comptes/logo/index.html.twig', [
            'controller_name' => 'LogoExchangeController',
        ]);
    }
}
