<?php

namespace ICS\CryptoBundle\Entity\Crypto\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class User
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
     * @return string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $surname;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme", mappedBy="user")
     * @var ArrayCollection
     */
    private $plateformes;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Users\Contact", mappedBy="user")
     * @var ArrayCollection
     */
    private $contacts;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->contacts = new ArrayCollection();
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

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

    /**
     * Get the value of contacts
     */ 
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set the value of contacts
     *
     * @return  self
     */ 
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}//---Fin de la class User