<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Vente  controller ---
 *
 * Vente des cryptomonnaies vers une autre crypto/stablecoins/fiduciaire 
 *
 * @see /views/calcul/vente
 * @see /src/Entity/Crypto/calcul/Vente.php
 * @see /src/Repository/VenteRepository.php
 * @see /src/Service/VenteService.php
 * @see /src/Form/Type/calcul/VenteType.php
 *
 * @author Philippe Basuyau 
 */
class VenteController extends AbstractController
{
    /**
     * @Route("/calcul/vente", name="crypto_calcul_vente_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('vente/index.html.twig', [
            'controller_name' => 'VenteController',
        ]);
    }//--- Fin de la function index

}//--- fin e de la class VenteController
