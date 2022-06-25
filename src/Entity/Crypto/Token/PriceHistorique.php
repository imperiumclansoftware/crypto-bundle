<?php

namespace ICS\CryptoBundle\Entity\Crypto\Token;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class PriceHistorique
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $price;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $date;
    
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    
    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function __toString()
    {
        return $this->getPrice();
    }


    /**
     * Get the value of cryptomonnaies
     *
     * @return  ArrayCollection
     */ 
    public function getCryptomonnaies()
    {
        return $this->cryptomonnaies;
    }

    /**
     * Set the value of cryptomonnaies
     *
     * @param  ArrayCollection  $cryptomonnaies
     *
     * @return  self
     */ 
    public function setCryptomonnaies(ArrayCollection $cryptomonnaies)
    {
        $this->cryptomonnaies = $cryptomonnaies;

        return $this;
    }
}//---Fin de la class PriceHistorique