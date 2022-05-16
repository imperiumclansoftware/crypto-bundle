<?php

namespace ICS\CryptoBundle\Entity\Crypto\Calcul;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Gain extends Operation
{
    /**
     * @ORM\ManyToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Type", inversedBy="gains")
     * @ORM\JoinTable(
     *     name="TypeToGain",
     *     schema="crypto",
     *     joinColumns={@ORM\JoinColumn(name="gain_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)}
     * )
     * @var ArrayCollection
     */
    private $types;

    
    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->types = new ArrayCollection();
    }
        
    //--- Les Getters & les Setters ---
    /**
     * Get name="TypeToGain",
     */ 
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Set name="TypeToGain",
     *
     * @return  self
     */ 
    public function setTypes($types)
    {
        $this->types = $types;

        return $this;
    }

    
    /**
     * Get the value of prix
     */ 
    public function getPrixGlobal()
    {
        return $this->PrixGlobal;
    }

    public function __toString()
    {
        return $this->getTypes();
    }

}