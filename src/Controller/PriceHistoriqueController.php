<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Price Historique  controller ---
 *
 * le suivi du prix des cryptomonnaies
 *
 * @see /views/token/priceHistorique
 * @see /src/Entity/Crypto/Token/PriceHistorique.php
 * @see /src/Repository/PriceHistoriqueRepository.php
 * @see /src/Service/PriceHistoriqueService.php
 * @see /src/Form/Type/Token/PriceHistoriqueType.php
 *
 * @author Philippe Basuyau 
 */
class PriceHistoriqueController extends AbstractController
{
    /**
     * @Route("/token/priceHistorique", name="crypto_token_priceHistorique", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('priceHistorique/index.html.twig', [
            'controller_name' => 'PriceHistoriqueController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class PriceHistoriqueController
