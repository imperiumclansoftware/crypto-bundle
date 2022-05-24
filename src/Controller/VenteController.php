<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Vente;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/calcul/vente", name="ics_crypto_calcul_vente_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $ventes = $em
            ->getRepository(Vente::class)
            ->findAll();

            return $this->render('calcul/vente/index.html.twig', [
                'ventes' => $ventes,
            ]);
    }//--- Fin de la function index

}//--- fin e de la class VenteController
