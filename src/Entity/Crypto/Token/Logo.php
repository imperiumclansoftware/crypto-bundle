<?php

namespace ICS\CryptoBundle\Entity\Crypto\Token;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class LogoCrypto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="object", length=1000, nullable=true)
     */
    private $logoCrypto;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    private $gravity;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie", mappedBy="logoCrypto")
     * @var ArrayCollection
     */
    private $cryptomonnaies;
    
    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->cryptomonnaies = new ArrayCollection();
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
     * Get the value of logoCrypto
     */ 
    public function getLogoCrypto()
    {
        return $this->logoCrypto;
    }

    /**
     * Set the value of logoCrypto
     *
     * @return  self
     */ 
    public function setLogoCrypto($logoCrypto)
    {
        $this->logoCrypto = $logoCrypto;

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
     */ 
    public function getCryptomonnaies()
    {
        return $this->cryptomonnaies;
    }

    /**
     * Set the value of cryptomonnaies
     *
     * @return  self
     */ 
    public function setCryptomonnaies($cryptomonnaies)
    {
        $this->cryptomonnaies = $cryptomonnaies;

        return $this;
    }
}//--- Fin de la Class LogoCrypto