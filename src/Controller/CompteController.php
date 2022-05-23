<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Compte  controller ---
 *
 * les comptes 
 *
 * @see /views/comptes/compte
 * @see /src/Entity/Crypto/comptes/Compte.php
 * @see /src/Repository/CompteRepository.php
 * @see /src/Service/CompteService.php
 * @see /src/Form/Type/Comptes/CompteType.php
 *
 * @author Philippe Basuyau 
 */
class CompteController extends AbstractController
{
    /**
     * @Route("/comptes/compte", name="crypto_comptes_compte_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }//---Fin de la function index

}//--- Fin de la class CompteController
