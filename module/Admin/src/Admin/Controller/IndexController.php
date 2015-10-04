<?php

namespace Admin\Controller;

use Application\Entity\Person;
use Zend\View\Model\ViewModel;

class IndexController extends \Application\Controller\AbstractController
{

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $sl = $this->getServiceLocator();
        $personCollection = $em->getRepository('Application\Entity\Person')->findAll();
        
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'personCollection' => $personCollection,
            'fileService' => $sl->get('Admin\Service\FileService'),
        ]);
        
        return $viewModel;    
    }

}
