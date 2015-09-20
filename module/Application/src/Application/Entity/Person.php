<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Person
{

    const LARS = 1;
    const PATTY = 2;
    const LAMMIE = 3;
    const BETSIE = 4;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", options={"unsigned":true})
     */
    protected $personId;

    /** @ORM\Column(type="string", nullable=true) */
    protected $initials;

    /** @ORM\Column(type="string") */
    protected $firstname;

    /** @ORM\Column(type="string", nullable=true) */
    protected $middlename;

    /** @ORM\Column(type="string") */
    protected $lastname;

    /** @ORM\Column(type="date", nullable=true) */
    protected $birthday;

    /**
     * @ORM\ManyToOne(targetEntity="Gender")
     * @ORM\JoinColumn(name="genderId", referencedColumnName="genderId", nullable=false)
     */
    protected $gender;

    /** @ORM\Column(type="datetime") */
    protected $created;

    /**
     * @ORM\OneToOne(targetEntity="File")
     * @ORM\JoinColumn(name="fileId", referencedColumnName="fileId", nullable=true)
     */
    protected $file;

    /** @ORM\Column(type="datetime", nullable=true) */
    protected $deleted;

    /**
     * /**
     * Construct
     */
    public function __construct()
    {
        $this->created = new \Datetime('now');
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     *
     * @return Person
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param mixed $initials
     *
     * @return Person
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     *
     * @return Person
     */
    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     *
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     *
     * @return Person
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     *
     * @return Person
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    public function parseFullname()
    {
        $name = [
            'firstname'  => $this->getFirstname(),
            'middlename' => $this->getMiddlename(),
            'lastname'   => $this->getLastname(),
        ];

        return implode(' ', $name);
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * @param mixed $middlename
     *
     * @return Person
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     *
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
}
