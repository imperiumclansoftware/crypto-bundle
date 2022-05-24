<?php

namespace ICS\CryptoBundle\Entity\Crypto\Comptes;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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
    * @ORM\Column(type="date", nullable=true)
    *  @var DateTime
    */
    private $ouverture;

    /**
    * @ORM\Column(type="date", nullable=true)
    *  @var DateTime
    */
    private $cloture;

    /**
    * @ORM\Column(type="boolean", nullable=true)
    * @var bool
    */
    private $fondGarantie;

    /**
    * @ORM\Column(type="float", nullable=true)
    * @var float
    */
    private $montantGarantie;

    /**
     * @ORM\OneToOne(targetEntity="TypePlateforme", inversedBy="typeCompte")
     * @ORM\JoinColumn(name="typeCompte_id", referencedColumnName="id")
     */
    private $typePlateforme;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Users\User", inversedBy="plateformes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Operation", mappedBy="plateforme")
     * @var ArrayCollection
     */
    private $operations;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->operations = new ArrayCollection();
    }
     //--- Les Getters & les Setters ---



    /**
     * Get the value of nameCompte
     *
     * @return  string
     */ 
    public function getNameCompte()
    {
        return $this->nameCompte;
    }

    /**
     * Set the value of nameCompte
     *
     * @param  string  $nameCompte
     *
     * @return  self
     */ 
    public function setNameCompte(string $nameCompte)
    {
        $this->nameCompte = $nameCompte;

        return $this;
    }

    /**
     * Get the value of observation
     *
     * @return  string
     */ 
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     *
     * @param  string  $observation
     *
     * @return  self
     */ 
    public function setObservation(string $observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get the value of ouverture
     *
     * @return  DateTime
     */ 
    public function getOuverture()
    {
        return $this->ouverture;
    }

    /**
     * Set the value of ouverture
     *
     * @param  DateTime  $ouverture
     *
     * @return  self
     */ 
    public function setOuverture(DateTime $ouverture)
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    /**
     * Get the value of cloture
     *
     * @return  DateTime
     */ 
    public function getCloture()
    {
        return $this->cloture;
    }

    /**
     * Set the value of cloture
     *
     * @param  DateTime  $cloture
     *
     * @return  self
     */ 
    public function setCloture(DateTime $cloture)
    {
        $this->cloture = $cloture;

        return $this;
    }

    /**
     * Get the value of fondGarantie
     *
     * @return  bool
     */ 
    public function getFondGarantie()
    {
        return $this->fondGarantie;
    }

    /**
     * Set the value of fondGarantie
     *
     * @param  bool  $fondGarantie
     *
     * @return  self
     */ 
    public function setFondGarantie(bool $fondGarantie)
    {
        $this->fondGarantie = $fondGarantie;

        return $this;
    }

    /**
     * Get the value of montantGarantie
     *
     * @return  float
     */ 
    public function getMontantGarantie()
    {
        return $this->montantGarantie;
    }

    /**
     * Set the value of montantGarantie
     *
     * @param  float  $montantGarantie
     *
     * @return  self
     */ 
    public function setMontantGarantie(float $montantGarantie)
    {
        $this->montantGarantie = $montantGarantie;

        return $this;
    }

    /**
     * Get the value of typePlateforme
     */ 
    public function getTypePlateforme()
    {
        return $this->typePlateforme;
    }

    /**
     * Set the value of typePlateforme
     *
     * @return  self
     */ 
    public function setTypePlateforme($typePlateforme)
    {
        $this->typePlateforme = $typePlateforme;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of operations
     *
     * @return  ArrayCollection
     */ 
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Set the value of operations
     *
     * @param  ArrayCollection  $operations
     *
     * @return  self
     */ 
    public function setOperations(ArrayCollection $operations)
    {
        $this->operations = $operations;

        return $this;
    }
}//--- FIn de la class Compte