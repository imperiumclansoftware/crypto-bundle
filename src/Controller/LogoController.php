<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  LogoCrypto  controller ---
 *
 * les logos des cryptomonnaies
 *
 * @see /views/token/LogoCrypto
 * @see /src/Entity/Crypto/Token/LogoCrypto.php
 * @see /src/Repository/LogoCryptoRepository.php
 * @see /src/Service/LogoCryptoService.php
 * @see /src/Form/Type/Token/LogoCryptoType.php
 *
 * @author Philippe Basuyau 
 */
class LogoCryptoController extends AbstractController
{
    /**
     *  @Route("/token/logo", name="crypto_token_logo_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('token/logoCrypto/index.html.twig', [
            'controller_name' => 'LogoCryptoController',
        ]);
    }//---Fin de function index


}//--- Fin de la class LogoCryptoController
