<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Cryptomonnaie  controller ---
 *
 *  Cryptomonnaie
 *
 * @see /views/token/cryptomonnaie
 * @see /src/Entity/Crypto/Token/Cryptomonnaie.php
 * @see /src/Repository/CryptomonnaieRepository.php
 * @see /src/Service/CryptomonnaieService.php
 * @see /src/Form/Type/Token/CryptomonnaieType.php
 *
 * @author Philippe Basuyau 
 */
class CryptomonnaieController extends AbstractController
{
    /**
     * @Route("/token/cryptomonnaie", name="crypto_token_cryptomonnaie_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('cryptomonnaie/index.html.twig', [
            'controller_name' => 'CryptomonnaieController',
        ]);
    }//--- Fin de la function Cryptomonnaie

}//--- Fin de la class CryptomonnaieController
