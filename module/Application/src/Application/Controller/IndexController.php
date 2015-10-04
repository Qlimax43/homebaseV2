<?php

namespace Application\Controller;

use Application\Entity\Person;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{

    public function indexAction()
    {
        $em        = $this->getEntityManager();
        $sl        = $this->getServiceLocator();
        $viewModel = new ViewModel();

        $lars   = $em->getRepository('Application\Entity\Person')->find(Person::LARS);
        $patty  = $em->getRepository('Application\Entity\Person')->find(Person::PATTY);
        $betsie = $em->getRepository('Application\Entity\Person')->find(Person::BETSIE);
        $lammie = $em->getRepository('Application\Entity\Person')->find(Person::LAMMIE);


        $viewModel->setVariables([
            'lars'        => $lars,
            'patty'       => $patty,
            'betsie'      => $betsie,
            'lammie'      => $lammie,
            'fileService' => $sl->get('Admin\Service\FileService'),
        ]);


        return $viewModel;
    }

    public function larsAction()
    {
        return $this->prepareAction(Person::LARS);
    }

    public function pattyAction()
    {
        return $this->prepareAction(Person::PATTY);
    }

    public function lammieAction()
    {
        return $this->prepareAction(Person::LAMMIE);
    }

    public function betsieAction()
    {
        return $this->prepareAction(Person::BETSIE);
    }

    private function prepareAction($personId = 1)
    {
        $em        = $this->getEntityManager();
        $viewModel = new ViewModel();

        $lars = $em->getRepository('Application\Entity\Person')->find($personId);

        $viewModel->setTemplate('application/person/index');
        $viewModel->setVariables([
            'person' => $lars,
        ]);

        return $viewModel;
    }

}
