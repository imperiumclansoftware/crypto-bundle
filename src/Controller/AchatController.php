<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Achat;
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
     * @Route("/calcul/achat", name="ics_crypto_calcul_achat_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $achats = $em
            ->getRepository(Achat::class)
            ->findAll();

            return $this->render('calcul/achat/index.html.twig', [
                'achats' => $achats,
            ]);
    }//--- Fin de la function index

}//--- Fin de la class AchatController
