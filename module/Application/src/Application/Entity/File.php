<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class File extends AbstractEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", options={"unsigned":true})
     */
    protected $fileId;

    /** @ORM\Column(type="blob") */
    protected $data;

    /** @ORM\Column(type="string") */
    protected $mimetype;

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param mixed $fileId
     *
     * @return File
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return File
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getMimetype()
    {
        return $this->mimetype;
    }

    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
        return $this;
    }

}
