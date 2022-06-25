<?php

namespace ICS\CryptoBundle\Entity\Crypto\Token;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 */
abstract class Cryptomonnaie
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
    private $coin;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    private $coinCourt;

    
    /**
     * @ORM\Column(type="date", nullable=true)
     * @var DateTime
     */
    private $dateDebut;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     * @var DateTime
     */
    private $dateFin;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @var bool
     */
    private $favoris;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Utilite", inversedBy="cryptomonnaies")
     * @ORM\JoinColumn(name="utilite_id", referencedColumnName="id")
     */
    private $utilite;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Api", inversedBy="cryptomonnaies")
     * @ORM\JoinColumn(name="api_id", referencedColumnName="id")
     */
    private $api;

    /**
     * @ORM\OneToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Operation", mappedBy="crypto")
     */
    private $opera;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Concensus", inversedBy="cryptomonnaies")
     * @ORM\JoinColumn(name="concensus_id", referencedColumnName="id")
     */
    private $concensus;
    
    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\PriceHistorique", inversedBy="cryptomonnaies")
     * @ORM\JoinColumn(name="price_historique_id", referencedColumnName="id")
     */
    private $priceHistorique;
    
    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Norme", inversedBy="cryptomonnaies")
     * @ORM\JoinColumn(name="norme_id", referencedColumnName="id")
     */
    private $norme;
    
    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\LogoCrypto", inversedBy="cryptomonnaies")
     * @ORM\JoinColumn(name="logo_crypto_id", referencedColumnName="id")
     */
    private $logoCrypto;
    
    /**
     * @ORM\ManyToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Operation", inversedBy="cryptomonnaies")
     * @ORM\JoinTable(
     *     name="OperationToCryptomonnaie",
     *     joinColumns={@ORM\JoinColumn(name="cryptomonnaie_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="operation_id", referencedColumnName="id", nullable=false)}
     * )
     * @var ArrayCollection
     */
    private $operations;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->operations = new ArrayCollection();
    }
    //--- function for override
    //--- abstract placé devant me permet d'indiquer si il est manquant ou pas dans dans la class enfant pour m'obliger à la définir dans la class enfant
    abstract public function getTypes();
    abstract public function getPrixGlobal();
    
    public abstract function __toString();
    
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
     * Get the value of coinCourt
     */ 
    public function getCoinCourt()
    {
        return $this->coinCourt;
    }

    /**
     * Set the value of coinCourt
     *
     * @return  self
     */ 
    public function setCoinCourt($coinCourt)
    {
        $this->coinCourt = $coinCourt;

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
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of favoris
     */ 
    public function getFavoris()
    {
        return $this->favoris;
    }

    /**
     * Set the value of favoris
     *
     * @return  self
     */ 
    public function setFavoris($favoris)
    {
        $this->favoris = $favoris;

        return $this;
    }

    /**
     * Get the value of utilite
     */ 
    public function getUtilite()
    {
        return $this->utilite;
    }

    /**
     * Set the value of utilite
     *
     * @return  self
     */ 
    public function setUtilite($utilite)
    {
        $this->utilite = $utilite;

        return $this;
    }

    /**
     * Get the value of api
     */ 
    public function getApi()
    {
        return $this->api;
    }

    /**
     * Set the value of api
     *
     * @return  self
     */ 
    public function setApi($api)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * Get the value of opera
     */ 
    public function getOpera()
    {
        return $this->opera;
    }

    /**
     * Set the value of opera
     *
     * @return  self
     */ 
    public function setOpera($opera)
    {
        $this->opera = $opera;

        return $this;
    }

    /**
     * Get the value of concensus
     */ 
    public function getConcensus()
    {
        return $this->concensus;
    }

    /**
     * Set the value of concensus
     *
     * @return  self
     */ 
    public function setConcensus($concensus)
    {
        $this->concensus = $concensus;

        return $this;
    }

    /**
     * Get the value of priceHistorique
     */ 
    public function getPriceHistorique()
    {
        return $this->priceHistorique;
    }

    /**
     * Set the value of priceHistorique
     *
     * @return  self
     */ 
    public function setPriceHistorique($priceHistorique)
    {
        $this->priceHistorique = $priceHistorique;

        return $this;
    }

    /**
     * Get the value of norme
     */ 
    public function getNorme()
    {
        return $this->norme;
    }

    /**
     * Set the value of norme
     *
     * @return  self
     */ 
    public function setNorme($norme)
    {
        $this->norme = $norme;

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
     * Get )
     *
     * @return  ArrayCollection
     */ 
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Set )
     *
     * @param  ArrayCollection  $operations  )
     *
     * @return  self
     */ 
    public function setOperations(ArrayCollection $operations)
    {
        $this->operations = $operations;

        return $this;
    }
}//---Fin de la class Cryptomonnaie