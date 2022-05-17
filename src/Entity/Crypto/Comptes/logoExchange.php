<?php

namespace ICS\CryptoBundle\Entity\Crypto\Comptes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class logoExchange
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="object", length=1000, nullable=true)
     */
    private $logoExchange;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $gravity;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Comptes\Compte", mappedBy="logoExchange")
     */
    private $comptes;

    //--- Le Construc ---
    public function __construct()
    {
       //--- Pas de MtM et de OtM dans cette entity
        $this->comptes = new ArrayCollection();
    }
     //--- Les Getters & les Setters ---

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
     * Get the value of comptes
     */ 
    public function getComptes()
    {
        return $this->comptes;
    }

    /**
     * Set the value of comptes
     *
     * @return  self
     */ 
    public function setComptes($comptes)
    {
        $this->comptes = $comptes;

        return $this;
    }
}// fin de la class logoExchange