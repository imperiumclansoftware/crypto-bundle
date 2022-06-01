<?php

namespace ICS\CryptoBundle\Entity\Crypto\Comptes;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Plateforme
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
    private $gravity;

    /**
     * @ORM\Column(type="text", length=500, nullable=true)
     * @var string
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="logoExchange", inversedBy="plateformes")
     * @ORM\JoinColumn(name="logo_exchange_id", referencedColumnName="id")
     */
    // private $logoExchange;



     //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
    }
      //--- Les Getters & les Setters ---



    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     *
     * @return  string
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @param  string  $libelle
     *
     * @return  self
     */ 
    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of gravity
     *
     * @return  string
     */ 
    public function getGravity()
    {
        return $this->gravity;
    }

    /**
     * Set the value of gravity
     *
     * @param  string  $gravity
     *
     * @return  self
     */ 
    public function setGravity(string $gravity)
    {
        $this->gravity = $gravity;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
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
}//---Fin de la class Plateforme