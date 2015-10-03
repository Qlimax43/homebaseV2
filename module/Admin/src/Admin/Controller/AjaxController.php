<?php

namespace Admin\Controller;

use Application\Entity\Person;
use Zend\View\Model\ViewModel;

class AjaxController extends \Application\Controller\AbstractController
{

    public function fileAction()
    {
        $em     = $this->getEntityManager();
        $fileId = $this->params()->fromRoute('fileId');
        $file   = $em->getRepository('Application\Entity\File')->find($fileId);


        // Content type
        header('Content-Type: image/jpeg');

// Get new dimensions
        list($width, $height) = getimagesizefromstring($file->getData());
        $new_width  = $width;
        $new_height = $height;

// Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image   = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Output
        imagejpeg($image_p, null, 100);

}

}
