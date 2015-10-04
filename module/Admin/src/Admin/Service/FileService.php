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

        $parts  = explode('/', $postFile['type']);
        $public = 'public/';
        $link   = 'cache/' . $person->getPersonId() . '.' . end($parts);
        $path   = $public . $link;
        
        $data = file_get_contents($postFile['tmp_name']);
        $resized = $this->resizeImage($data, 300, 300, $path);

        $file = $person->getFile() ? : new File();
        $file->setData($resized)
                ->setMimetype($postFile['type']);

        $em->persist($file);
        $person->setFile($file);
        $em->persist($person);
        $em->flush();
    }

    public function resizeImage($data, $max_width, $max_height, $path)
    {
        list($orig_width, $orig_height) = getimagesizefromstring($data);

        $width  = $orig_width;
        $height = $orig_height;

        // taller
        if ($height > $max_height)
        {
            $width  = ($max_height / $height) * $width;
            $height = $max_height;
        }

        // wider
        if ($width > $max_width)
        {
            $height = ($max_width / $width) * $height;
            $width  = $max_width;
        }

        $image_p = imagecreatetruecolor($width, $height);

        $image = imagecreatefromstring($data);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

        imagepng($image_p, $path);

        return file_get_contents($path);
    }

}
