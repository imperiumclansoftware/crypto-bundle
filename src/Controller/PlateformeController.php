<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Plateforme controller ---
 *
 * Les diverses plates ou l'on peut acheter,vendre, détenir des comptes et des cryptomonnaies
 *
 * @see /views/comptes/plateforme
 * @see /src/Entity/Crypto/comptes/Plateforme.php
 * @see /src/Repository/PlateformeRepository.php
 * @see /src/Service/PlateformeService.php
 * @see /src/Form/Type/Comptes/PlateformeType.php
 *
 * @author Philippe Basuyau 
 */
class PlateformeController extends AbstractController
{
    /**
     * @Route("/comptes/plateforme", name="crypto_comptes_plateforme_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('plateforme/index.html.twig', [
            'controller_name' => 'PlateformeController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class PlateformeController
