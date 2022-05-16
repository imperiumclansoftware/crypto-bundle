<?php

namespace ICS\CryptoBundle\Entity\Crypto\Comptes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 */
abstract class Plateforme
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
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $email;

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
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $ouvertureCpt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $clotureCpt;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Calcul\Operation", mappedBy="plateforme")
     * @var ArrayCollection
     */
    private $operations;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Users\User", inversedBy="plateformes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

     //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->operations = new ArrayCollection();
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
     * Get the value of ouverture
     */ 
    public function getOuverture()
    {
        return $this->ouverture;
    }

    /**
     * Set the value of ouverture
     *
     * @return  self
     */ 
    public function setOuverture($ouverture)
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    /**
     * Get the value of cloture
     */ 
    public function getCloture()
    {
        return $this->cloture;
    }

    /**
     * Set the value of cloture
     *
     * @return  self
     */ 
    public function setCloture($cloture)
    {
        $this->cloture = $cloture;

        return $this;
    }

    /**
     * Get the value of fondGarantie
     */ 
    public function getFondGarantie()
    {
        return $this->fondGarantie;
    }

    /**
     * Set the value of fondGarantie
     *
     * @return  self
     */ 
    public function setFondGarantie($fondGarantie)
    {
        $this->fondGarantie = $fondGarantie;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Get the value of operations
     */ 
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Set the value of operations
     *
     * @return  self
     */ 
    public function setOperations($operations)
    {
        $this->operations = $operations;

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

    
    //--- function for override
    //--- abstract placé devant me permet d'indiquer si il est manquant ou pas dans dans la class enfant pour m'obliger à la définir dans la class enfant
    abstract public function getnameCompte();
    abstract public function getObservation();
    
    public abstract function __toString();


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
     * Get the value of ouvertureCpt
     */ 
    public function getOuvertureCpt()
    {
        return $this->ouvertureCpt;
    }

    /**
     * Set the value of ouvertureCpt
     *
     * @return  self
     */ 
    public function setOuvertureCpt($ouvertureCpt)
    {
        $this->ouvertureCpt = $ouvertureCpt;

        return $this;
    }

    /**
     * Get the value of clotureCpt
     */ 
    public function getClotureCpt()
    {
        return $this->clotureCpt;
    }

    /**
     * Set the value of clotureCpt
     *
     * @return  self
     */ 
    public function setClotureCpt($clotureCpt)
    {
        $this->clotureCpt = $clotureCpt;

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
}//---Fin de la class Plateforme