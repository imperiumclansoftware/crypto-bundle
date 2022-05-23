<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Logo des exchange  controller ---
 *
 * les logos corresponds au diver comptes
 *
 * @see /views/comptes/logoExchange
 * @see /src/Entity/Crypto/comptes/LogoExchange.php
 * @see /src/Form/Type/Comptes/LogoExchangeType.php
 *
 * @author Philippe Basuyau 
 */
class LogoExchangeController extends AbstractController
{
    /**
     * @Route("/comptes/logoexchange", name="crypto_comptes_logoexchange_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('Comptes/logoExchange/index.html.twig', [
            'controller_name' => 'LogoExchangeController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class LogoExchangeController
