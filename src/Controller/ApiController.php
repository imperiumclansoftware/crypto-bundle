<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Api  controller ---
 *
 * la gamme d'utilité de la cryptomonnaie
 *
 * @see /views/token/api
 * @see /src/Entity/Crypto/Token/Api.php
 * @see /src/Repository/ApiRepository.php
 * @see /src/Service/ApiService.php
 * @see /src/Form/Type/Token/ApiType.php
 *
 * @author Philippe Basuyau 
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/token/api", name="crypto_token_api_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }//--- Fin de la function Api
    
}//--- Fin de la class Api
