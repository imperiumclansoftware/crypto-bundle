<?php

namespace ICS\CryptoBundle\Entity\Crypto\Token;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Api
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
     *
     */
    private $rang;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    private $coin;


    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $libelleCoin;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $prixMarche;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie", mappedBy="api")
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
     * Get the value of prixMarche
     */ 
    public function getPrixMarche()
    {
        return $this->prixMarche;
    }

    /**
     * Set the value of prixMarche
     *
     * @return  self
     */ 
    public function setPrixMarche($prixMarche)
    {
        $this->prixMarche = $prixMarche;

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

    
    /**
     * Get the value of rang
     *
     * @return  number
     */ 
    public function getRang()
    {
        return $this->rang;
    }
    
    /**
     * Set the value of rang
     *
     * @param  number  $rang
     *
     * @return  self
     */ 
    public function setRang($rang)
    {
        $this->rang = $rang;
        
        return $this;
    }
    
    /**
     * Get the value of coin
     */ 
    public function getCoin()
    {
        return $this->coin;
    }
    
    /**
     * Set the value of coin
     *
     * @return  self
     */ 
    public function setCoin($coin)
    {
        $this->coin = $coin;
        
        return $this;
    }

    /**
     * Get the value of libelleCoin
     */ 
    public function getLibelleCoin()
    {
        return $this->libelleCoin;
    }
    
    /**
     * Set the value of libelleCoin
     *
     * @return  self
     */ 
    public function setLibelleCoin($libelleCoin)
    {
        $this->libelleCoin = $libelleCoin;
        
        return $this;
    }
    
    public function __toString()
    {
        return $this->getCoin();
    }
}//---Fin de la class Api