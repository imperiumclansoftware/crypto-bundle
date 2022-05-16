<?php

namespace ICS\CryptoBundle\Entity\Crypto\Calcul;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Achat extends Operation
{
    
    /**
     * Get the value of prix
     */ 
    public function getPrixGlobal()
    {
        return $this->prixGlobal  * (+1);
    }

    /**
     * Get name="TypeToGain",
     */ 
    public function getTypes()
    {
        return $this->types;
    }
    
    public function __toString()
    {
        return $this->getPrixGlobal();
    }
}