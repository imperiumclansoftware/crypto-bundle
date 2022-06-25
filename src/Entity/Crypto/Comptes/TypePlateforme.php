<?php

namespace ICS\CryptoBundle\Entity\Crypto\Comptes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class TypePlateforme
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $icon;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme", mappedBy="types")
     * @var ArrayCollection
     */ 
    private $type;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->type = new ArrayCollection();
    }

    
    public function __toString()
    {
        return $this->getLibelle();
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
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of icon
     *
     * @return  string
     */ 
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @param  string  $icon
     *
     * @return  self
     */ 
    public function setIcon(string $icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}//--- Fin de la class TypePlateforme