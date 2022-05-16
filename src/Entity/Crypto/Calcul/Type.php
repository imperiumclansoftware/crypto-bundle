<?php

namespace ICS\CryptoBundle\Entity\Crypto\Calcul;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $Libelle;

    /**
     * @ORM\ManyToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Gain", mappedBy="types")
     * @var ArrayCollection
     */
    private $gains;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->gains = new ArrayCollection();
    }
        
    //--- Les Getters & les Setters ---
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Libelle
     */ 
    public function getLibelle()
    {
        return $this->Libelle;
    }

    /**
     * Set the value of Libelle
     *
     * @return  self
     */ 
    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    /**
     * Get the value of gains
     */ 
    public function getGains()
    {
        return $this->gains;
    }

    /**
     * Set the value of gains
     *
     * @return  self
     */ 
    public function setGains($gains)
    {
        $this->gains = $gains;

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelle();
    }
}