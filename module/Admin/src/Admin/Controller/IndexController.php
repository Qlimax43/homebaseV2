<?php

namespace Admin\Controller;

use Application\Entity\Person;
use Zend\View\Model\ViewModel;

class IndexController extends \Application\Controller\AbstractController
{

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $personCollection = $em->getRepository('Application\Entity\Person')->findAll();
        
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'personCollection' => $personCollection
        ]);
        
        return $viewModel;    
    }

}
