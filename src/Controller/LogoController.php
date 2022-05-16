<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogoController extends AbstractController
{
    /**
     * @Route("/logo", name="app_logo")
     */
    public function index(): Response
    {
        return $this->render('token/logo/index.html.twig', [
            'controller_name' => 'LogoController',
        ]);
    }
}
