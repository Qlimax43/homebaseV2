<?php

namespace Admin\View\Helper;

class PersonIconHelper extends \Zend\View\Helper\AbstractHelper
{

    public function __invoke(\Application\Entity\Person $person)
    {
        if ($person->getFile())
        {
            $file     = $person->getFile();
            
            return '<img class="img-circle img-thumb" src="/ajax/file/'. $file->getFileId() .'" alt="#">';

//            imagedestroy($image);
        }
        else
        {
            $gender = $person->getGender()->getName();
            return '<i class="fa fa-' . strtolower($gender) . ' fa-4x"></i>';
        }
    }

}
