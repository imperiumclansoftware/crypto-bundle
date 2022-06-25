<?php

namespace ICS\CryptoBundle\Entity\Crypto\Calcul;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Gain extends Operation
{
    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Type", inversedBy="gains")
     * 
     */
    private $typesGain;

    
    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
    }

    public function __toString()
    {
        return $this->getTypesGain();
    }
    //--- Les Getters & les Setters ---
    
    /**
     * Get the value of prix
     */ 
    public function getPrixGlobal()
    {
        return $this->PrixGlobal;
    }

    /**
     * Get 
     */ 
    public function getTypesGain()
    {
        return $this->typesGain;
    }

    /**
     * set
     */ 
    public function setTypesGain($typesGain)
    {
        $this->typesGain = $typesGain;

        return $this;
    }
}