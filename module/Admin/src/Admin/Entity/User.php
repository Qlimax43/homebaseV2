<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User extends \Application\Entity\AbstractEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", options={"unsigned":true})
     */
    protected $userId;

    /** @ORM\Column(type="string", nullable=false) */
    protected $email;
    
    /** @ORM\Column(type="string", nullable=false) */
    protected $password;
    
    /**
     * @ORM\OneToOne(targetEntity="Application\Entity\Person")
     * @ORM\JoinColumn(name="personId", referencedColumnName="personId", nullable=true)
     */
    protected $person;
    
    /**
     * @ORM\Column(type="date", nullable=false)
     */
    protected $created;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $deleted;
    
    public function __construct()
    {
        $this->created = new \DateTime('now');
    }

    /**
     * 
     * @return type
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * 
     * @return type
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * 
     * @return type
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 
     * @return type
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * 
     * @param type $userId
     * @return \Admin\Entity\User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * 
     * @param type $email
     * @return \Admin\Entity\User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * 
     * @param type $password
     * @return \Admin\Entity\User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * 
     * @param type $person
     * @return \Admin\Entity\User
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }    
    

}
