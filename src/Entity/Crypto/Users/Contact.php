<?php

namespace ICS\CryptoBundle\Entity\Crypto\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

// REGEX PHONE
// /^\(0\)[0-9]*$
// /^\+31\(0\)[0-9]*$

/**
 * @author Philippe BASUYAU
 * @ORM\Entity
 * @ORM\Table(schema="crypto")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @var string
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @var string
     */
    private $adressMail;

    /**
     * @ORM\OneToMany(targetEntity="ICS\CryptoBundle\Entity\Crypto\Users\User", mappedBy="contacts")
     * @var ArrayCollection
     */
    private $user;

    //--- Le Construc ---
    public function __construct()
    {
        //--- Pas de MtM et de OtM dans cette entity
        $this->user = new ArrayCollection();
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
     * Get the value of adressMail
     */ 
    public function getAdressMail()
    {
        return $this->adressMail;
    }

    /**
     * Set the value of adressMail
     *
     * @return  self
     */ 
    public function setAdressMail($adressMail)
    {
        $this->adressMail = $adressMail;

        return $this;
    }

    /**
     * Get the value of user
     * @return  ArrayCollection
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     * @param  ArrayCollection $user
     * @return  self
     */ 
    public function setUser(ArrayCollection $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    } 
    
    public function __toString()
    {
        return $this->getAdressMail();
    }


}//--- Fin de la class Contact