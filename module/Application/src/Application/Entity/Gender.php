<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Gender
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", options={"unsigned":true})
     */
    protected $genderId;

    /** @ORM\Column(type="string") */
    protected $name;

    public function getGenderId()
    {
        return $this->genderId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setGenderId($genderId)
    {
        $this->genderId = $genderId;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}
