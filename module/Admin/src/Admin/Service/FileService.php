<?php

namespace Admin\Service;

use Application\Service\AbstractService;
use Application\Entity\Person;
use Application\Entity\File;

class FileService extends AbstractService
{

    public function addFileToPerson(Person $person, $postFile = [])
    {
        $em = $this->getEntityManager();

        $file = $person->getFile() ? : new File();
        $file->setData(file_get_contents($postFile['tmp_name']))
                ->setMimetype($postFile['type']);
        
        $em->persist($file);
        $person->setFile($file);
        $em->persist($person);
        $em->flush();
    }

}
