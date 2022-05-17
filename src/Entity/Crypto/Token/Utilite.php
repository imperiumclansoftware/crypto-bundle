<?php

namespace ICS\CryptoBundle\Entity\Crypto\Token;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Utilite
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
    private $utilite;

    /**
     * --- La description de l'utilité des cette cryptomonnaies ---
     * @ORM\Column(type="text", length=500, nullable=true)
     * @var string
     */
    private $description;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
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

    public function __toString()
    {
        return $this->getUtilite();
    }
}//---Fin de la class Utilite