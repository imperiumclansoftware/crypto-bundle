<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PriceHistoriqueController extends AbstractController
{
    /**
     * @Route("/priceHistorique", name="app_price_historique")
     */
    public function index(): Response
    {
        return $this->render('priceHistorique/index.html.twig', [
            'controller_name' => 'PriceHistoriqueController',
        ]);
    }
}
