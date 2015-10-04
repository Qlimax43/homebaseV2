<?php

namespace Admin\View\Helper;

class PersonIconHelper extends \Zend\View\Helper\AbstractHelper
{

    public function __invoke(\Application\Entity\Person $person, \Admin\Service\FileService $fileService, $imgClass = 'img-circle img-thumbnail img-sm')
    {
        if ($person->getFile())
        {
            if (!file_exists('public/' . $person->parseFilePath()))
            {
                $file = $person->getFile();
                $data = $file->getData();
                $fileService->resizeImage(stream_get_contents($data), 200, 200, 'public/' . $person->parseFilePath());
            }

            return "<img class='" . $imgClass . "' src='" . $person->parseFilePath() . "' />";
        }
        else
        {
            $gender = $person->getGender()->getName();
            return '<i class="fa fa-' . strtolower($gender) . ' fa-4x"></i>';
        }
    }

}
