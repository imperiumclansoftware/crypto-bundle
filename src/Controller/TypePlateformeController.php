<?php

namespace ICS\CryptoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * --- TypePlateforme controller ---
 *
 * les TypePlateforme de plateForme (sur pc, sur mobile, sur tablette)  
 *
 * @see /views/comptes/typePlateforme
 * @see /src/Entity/Crypto/comptes/TypePlateforme.php
 * @see /src/Repository/TypePlateformeRepository.php
 * @see /src/Service/TypePlateformeService.php
 * @see /src/Form/Type/Comptes/TypePlateformeType.php
 *
 * @author Philippe Basuyau 
 */
class TypePlateformeController extends AbstractController
{
    /**
     * @Route("/comptes/typeplateforme", name="crypto_comptes_typeplateforme_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(): Response
    {
        return $this->render('type_plateforme/index.html.twig', [
            'controller_name' => 'TypePlateformeController',
        ]);
    }//--- Fin de la function index

}//--- Fin de la class TypePlateformeController
