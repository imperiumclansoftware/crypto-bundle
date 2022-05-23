<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Achat  controller ---
 *
 * Achat de la cryptomonnaie
 *
 * @see /views/calcul/achat
 * @see /src/Entity/Crypto/Calcul/Achat.php
 * @see /src/Repository/AchatRepository.php
 * @see /src/Service/AchatService.php
 * @see /src/Form/Type/Calcul/AchatType.php
 *
 * @author Philippe Basuyau 
 */
class AchatController extends AbstractController
{
    /**
     * @Route("/calcul/achat", name="crypto_calcul_achat_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('achat/index.html.twig', [
            'controller_name' => 'AchatController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class AchatController
