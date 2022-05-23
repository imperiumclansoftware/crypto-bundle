<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Type controller ---
 *
 * Type des cryptomonnaies
 *
 * @see /views/calcul/type
 * @see /src/Entity/Crypto/calcul/Type.php
 * @see /src/Repository/TypeRepository.php
 * @see /src/Service/TypeService.php
 * @see /src/Form/Type/calcul/TypeType.php
 *
 * @author Philippe Basuyau 
 */
class TypeController extends AbstractController
{
    /**
     * @Route("/calcul/type", name="crypto_calcul_type_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('type/index.html.twig', [
            'controller_name' => 'TypeController',
        ]);
    }//--- fin de la function index

}//--- Fin de la class TypeController
