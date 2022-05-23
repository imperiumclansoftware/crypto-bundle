<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * ---  Gain controller ---
 *
 * Gain de crypto par différent biais outre que l'achat, 
 *
 * @see /views/calcul/gain
 * @see /src/Entity/Crypto/calcul/Gain.php
 * @see /src/Repository/GainRepository.php
 * @see /src/Service/GainService.php
 * @see /src/Form/Type/calcul/GainType.php
 *
 * @author Philippe Basuyau 
 */
class GainController extends AbstractController
{
    /**
     * @Route("/calcul/gain", name="crypto_calcul_gain_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('gain/index.html.twig', [
            'controller_name' => 'GainController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class GainController
