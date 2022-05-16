<?php

namespace ICS\CryptoBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @author Philippe BASUYAU
 * @see Entity
 * @see Controller
 */
class PlateformeService{

    public function __construct(EntityManagerInterface $doctrine)
	{
		$this->doctrine = $doctrine;
	}



}//Fin de la class PlateformeService