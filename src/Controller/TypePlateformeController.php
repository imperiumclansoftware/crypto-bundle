<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypePlateformeController extends AbstractController
{
    /**
     * @Route("/type/plateforme", name="app_type_plateforme")
     */
    public function index(): Response
    {
        return $this->render('type_plateforme/index.html.twig', [
            'controller_name' => 'TypePlateformeController',
        ]);
    }
}
