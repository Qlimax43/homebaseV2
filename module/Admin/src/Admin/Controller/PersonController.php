<?php

namespace Admin\Controller;

use Application\Entity\Person;
use Zend\View\Model\ViewModel;

class PersonController extends \Application\Controller\AbstractController
{

    public function indexAction()
    {
        $em               = $this->getEntityManager();
        $personCollection = $em->getRepository('Application\Entity\Person')->findAll();

        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'personCollection' => $personCollection
        ]);

        return $viewModel;
    }

    public function editAction()
    {
        $em          = $this->getEntityManager();
        $sl          = $this->getServiceLocator();
        $request     = $this->getRequest();
        $personId    = $this->params()->fromRoute('personId');
        $person      = $em->getRepository('Application\Entity\Person')->find($personId);
        $fileService = $sl->get('Application\Service\FileService');


        /* @var $form \Admin\Form\PersonForm */
        $form = $sl->get('FormElementManager')->get('Admin\Form\PersonForm');
        $form->bind($person);

        if ($request->isPost())
        {
            $form->setData($request->getPost());
            if ($form->isValid())
            {
                $file = $this->params()->fromFiles('file');
                $this->processFileIntoPerson($person, $file);

                $em->persist($person);
                $em->flush();

                return $this->redirect()->toRoute('admin');
            }
        }

        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'form'  => $form,
            'title' => _('Edit person')
        ])->setTemplate('admin/person/form');

        return $viewModel;
    }

    private function processFileIntoPerson(Person $person, $file = [])
    {
        if ($file['size'] > 0)
        {
            $sl          = $this->getServiceLocator();
            $fileService = $sl->get('Application\Service\FileService');

            $fileService->addFileToPerson($person, $file);
        }
    }

}
