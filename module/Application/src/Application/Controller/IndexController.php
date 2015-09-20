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

        $lars = $em->getRepository('Applicaton\Entity\Person')->find(Person::LARS);

        $viewModel->setVariables([
            'person' => $lars,
        ]);

        return $viewModel;
    }
}
