<?php

namespace ICS\CryptoBundle\Entity\Crypto\Token;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Concensus
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
     * @ORM\Column(type="text", length=500, nullable=true)
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    private $gravity;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie", mappedBy="concensus")
     * @var ArrayCollection
     */
    private $cryptomonnaies;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->cryptomonnaies = new ArrayCollection();
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of gravity
     */ 
    public function getGravity()
    {
        return $this->gravity;
    }

    /**
     * Set the value of gravity
     *
     * @return  self
     */ 
    public function setGravity($gravity)
    {
        $this->gravity = $gravity;

        return $this;
    }

    /**
     * Get the value of cryptomonnaies
     * @return  ArrayCollection
     */ 
    public function getCryptomonnaies()
    {
        return $this->cryptomonnaies;
    }

    /**
     * Set the value of cryptomonnaies
     * @param  ArrayCollection $cryptomonnaie
     *
     * @return  self
     */ 
    public function setCryptomonnaies(ArrayCollection $cryptomonnaies)
    {
        $this->cryptomonnaies = $cryptomonnaies;

        return $this;
    }
}//--- Fin de la class Concensus