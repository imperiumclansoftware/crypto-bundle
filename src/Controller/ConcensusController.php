<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Concensus  controller ---
 *
 * le concensus de la cryptomonnaie
 *
 * @see /views/token/concensus
 * @see /src/Entity/Crypto/Token/Concensus.php
 * @see /src/Repository/ConcensusRepository.php
 * @see /src/Service/ConcensusService.php
 * @see /src/Form/Type/Token/ConcensusType.php
 *
 * @author Philippe Basuyau 
 */
class ConcensusController extends AbstractController
{
    /**
     *  @Route("/token/concensus", name="crypto_token_concensus_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('concensus/index.html.twig', [
            'controller_name' => 'ConcensusController',
        ]);
    }//--- Fin de la function Consensus

}//--- Fin de la class Concensus

