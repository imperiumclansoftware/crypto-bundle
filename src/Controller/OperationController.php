<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Opération  controller ---
 *
 * Opération sur les  cryptomonnaies 
 *
 * @see /views/calcul/operation
 * @see /src/Entity/Crypto/calcul/Operation.php
 * @see /src/Repository/OperationRepository.php
 * @see /src/Service/OperationService.php
 * @see /src/Form/Type/calcul/OperationType.php
 *
 * @author Philippe Basuyau 
 */
class OperationController extends AbstractController
{
    /**
     * @Route("/calcul/operation", name="crypto_calcul_operation_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('operation/index.html.twig', [
            'controller_name' => 'OperationController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class OperationController
