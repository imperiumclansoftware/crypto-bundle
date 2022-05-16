<?php

namespace ICS\CryptoBundle\Entity\Crypto\Comptes;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Compte extends Plateforme
{
    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $nameCompte;

    /**
     * @ORM\Column(type="text", length=500, nullable=true)
     * @var string
     */
    private $observation;

    /**
     * @ORM\OneToOne(targetEntity="TypePlateforme", inversedBy="typeCompte")
     * @ORM\JoinColumn(name="typeCompte_id", referencedColumnName="id")
     */
    private $typePlateform;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Comptes\logoExchange", inversedBy="comptes")
     * @ORM\JoinColumn(name="logo_exchange_id", referencedColumnName="id")
     */
    private $logoExchange;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
    }
     //--- Les Getters & les Setters ---




    /**
     * Get the value of nameCompte
     */ 
    public function getNameCompte()
    {
        return $this->nameCompte;
    }

    /**
     * Set the value of nameCompte
     *
     * @return  self
     */ 
    public function setNameCompte($nameCompte)
    {
        $this->nameCompte = $nameCompte;

        return $this;
    }

    /**
     * Get the value of observation
     */ 
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     *
     * @return  self
     */ 
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get the value of nameType
     */ 
    public function getNameType()
    {
        return $this->nameType;
    }
    

    /**
     * Get the value of typePlateform
     */ 
    public function getTypePlateform()
    {
        return $this->typePlateform;
    }

    /**
     * Set the value of typePlateform
     *
     * @return  self
     */ 
    public function setTypePlateform($typePlateform)
    {
        $this->typePlateform = $typePlateform;

        return $this;
    }

    public function __toString()
    {
        return $this->getNameCompte();
    }

    /**
     * Get the value of logoExchange
     */ 
    public function getLogoExchange()
    {
        return $this->logoExchange;
    }

    /**
     * Set the value of logoExchange
     *
     * @return  self
     */ 
    public function setLogoExchange($logoExchange)
    {
        $this->logoExchange = $logoExchange;

        return $this;
    }
}//--- FIn de la class Compte