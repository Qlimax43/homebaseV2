<?php

namespace Application\Controller;

use Application\Entity\Person;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function larsAction()
    {
        $em        = $this->getEntityManager();
        $viewModel = new ViewModel();

        $lars = $em->getRepository('Application\Entity\Person')->find(Person::LARS);

        $viewModel->setTemplate('application/person/index');
        $viewModel->setVariables([
            'person' => $lars,
        ]);

        return $viewModel;
    }
}
