<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Norme controller ---
 *
 * la norme de la cryptomonnaie
 *
 * @see /views/token/norme
 * @see /src/Entity/Crypto/Token/Norme.php
 * @see /src/Repository/NormeRepository.php
 * @see /src/Service/NormeService.php
 * @see /src/Form/Type/Token/NormeType.php
 *
 * @author Philippe Basuyau 
 */
class NormeController extends AbstractController
{
    /**
     *  @Route("/token/norme", name="crypto_token_norme_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('norme/index.html.twig', [
            'controller_name' => 'NormeController',
        ]);
    }//--- Fin de la function index
}//--- Fin de la class NormeController
