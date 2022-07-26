<?php

namespace ICS\CryptoBundle\Entity\Crypto\Calcul;

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
class Operation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * ---0 ---
     * --- La date de l'opération --- 
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $date;
    
    /**
     * --- 2 ---
     * --- le nombre d'unité pour cette opération ---
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $nbrUnite;

    /**
     * --- 4 ---
     * ---l Le prix par unitée
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $prixUnitaire;

    /**
     * --- 3 ---
     * --- Le cout total de l'opération ---
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $prixGlobal;

    /**
     * --- La description de l'opération ---
     * @ORM\Column(type="text", length=500, nullable=true)
     * @var string
     */
    private $description;

    /**
     * --- le code coleur ---
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $gravity;

    /**
     * --- 6 ---
     * --- le prix acheté
     * @ORM\Column(type="float", nullable=true)
     *  @var float
     */
    private $euroAchete;

    /**
     * --- 7 ---
     * --- le prix d'Achat
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $euroAchat;

    
    /**
     * --- 5 ---
     * @ORM\OneToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie", inversedBy="operationCryptoAchat")
     * @ORM\JoinColumn(name="cryptomonnaie_id", referencedColumnName="id", unique=true)
     */
    private $cryptoAchat;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Comptes\Compte", inversedBy="operations")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $compte;

    /**
     * --- 1 ---
     * @ORM\ManyToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie", inversedBy="operationAchete")
     * @ORM\JoinTable(
     *     name="CryptomonnaieToOperation",
     *     schema="crypto",
     *     joinColumns={@ORM\JoinColumn(name="operation_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="cryptoAchete_id", referencedColumnName="id", nullable=false)}
     * )
     * @var ArrayCollection
     */
    private $cryptoAchete;

    /**
     * @ORM\ManyToOne(targetEntity="ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme", inversedBy="$calculOperation")
     * @ORM\JoinColumn(name="plateforme_id", referencedColumnName="id")
    */
    private $plateformes;


    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->cryptoAchete = new ArrayCollection();
        $this->plateformes = new ArrayCollection();
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
     * Get the value of prixGlobal
     */ 
    public function getPrixGlobal()
    {
        return $this->prixGlobal;
    }

    /**
     * Set the value of prixGlobal
     *
     * @return  self
     */ 
    public function setPrixGlobal($prixGlobal)
    {
        $this->prixGlobal = $prixGlobal;

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



    /**
     * Get --- le prix acheté
     *
     * @return  float
     */ 
    public function getEuroAchete()
    {
        return $this->euroAchete;
    }

    /**
     * Set --- le prix acheté
     *
     * @param  float  $euroAchete  --- le prix acheté
     *
     * @return  self
     */ 
    public function setEuroAchete(float $euroAchete)
    {
        $this->euroAchete = $euroAchete;

        return $this;
    }

    /**
     * Get 
     *
     * @return  ArrayCollection
     */ 
    public function getCryptoAchete()
    {
        return $this->cryptoAchete;
    }

    /**
     * Set 
     *
     * @param  ArrayCollection  $cryptoAchete  name="CryptomonnaieToOperation",
     *
     * @return  self
     */ 
    public function setCryptoAchete(ArrayCollection $cryptoAchete)
    {
        $this->cryptoAchete = $cryptoAchete;

        return $this;
    }

    /**
     * Get --- le prix d'Achat
     *
     * @return  float
     */ 
    public function getEuroAchat()
    {
        return $this->euroAchat;
    }

    /**
     * Set --- le prix d'Achat
     *
     * @param  float  $euroAchat  --- le prix d'Achat
     *
     * @return  self
     */ 
    public function setEuroAchat(float $euroAchat)
    {
        $this->euroAchat = $euroAchat;

        return $this;
    }




    /**
     * Get --- le nombre d'unité pour cette opération ---
     *
     * @return  int
     */ 
    public function getNbrUnite()
    {
        return $this->nbrUnite;
    }

    /**
     * Set --- le nombre d'unité pour cette opération ---
     *
     * @param  int  $nbrUnite  --- le nombre d'unité pour cette opération ---
     *
     * @return  self
     */ 
    public function setNbrUnite(int $nbrUnite)
    {
        $this->nbrUnite = $nbrUnite;

        return $this;
    }

    /**
     * Get ---l Le prix par unitée
     *
     * @return  float
     */ 
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set ---l Le prix par unitée
     *
     * @param  float  $prixUnitaire  ---l Le prix par unitée
     *
     * @return  self
     */ 
    public function setPrixUnitaire(float $prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }


    //--- function for override
    //--- abstract placé devant me permet d'indiquer si il est manquant ou pas dans dans la class enfant pour m'obliger à la définir dans la class enfant
    //abstract public function getPrixGlobal();
    //abstract public function getTypesGain();
    
    //public abstract function __toString();
    
    /**
     * Get --- 5 ---
     */ 
    public function getCryptoAchat()
    {
        return $this->cryptoAchat;
    }

    /**
     * Set --- 5 ---
     *
     * @return  self
     */ 
    public function setCryptoAchat($cryptoAchat)
    {
        $this->cryptoAchat = $cryptoAchat;

        return $this;
    }

    /**
     * Get the value of compte
     */ 
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set the value of compte
     *
     * @return  self
     */ 
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get the value of plateformes
     */ 
    public function getPlateformes()
    {
        return $this->plateformes;
    }

    /**
     * Set the value of plateformes
     *
     * @return  self
     */ 
    public function setPlateformes($plateformes)
    {
        $this->plateformes = $plateformes;

        return $this;
    }
}//--- Fin de la class Operation