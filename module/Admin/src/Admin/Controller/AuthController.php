<?php

namespace Admin\Controller;

use Application\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractController
{

    public function loginAction()
    {

        $sl      = $this->getServiceLocator();
        $em      = $this->getEntityManager();
        $request = $this->getRequest();
        $form    = $sl->get('FormElementManager')->get('Admin\Form\LoginForm');

        if ($request->isPost())
        {
            $form->setData($request->getPost());
            if ($form->isValid())
            {
                $user = $em->getRepository('Admin\Entity\User')
                        ->findOneBy([
                    'email'    => $form->get('email')->getValue(),
                    'password' => md5($form->get('password')->getValue()),
                ]);
                

                if ($user)
                {
                    $_SESSION['loggedin'] = true;
                    
                    return $this->redirect()->toRoute('admin');
                }
            }
        }

        return new ViewModel([
            'form' => $form
        ]);
    }

}
