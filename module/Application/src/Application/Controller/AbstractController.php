<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Doctrine\ORM\EntityManager;

abstract class AbstractController extends AbstractActionController
{

    protected $entitymanager;
    protected $translator;

    /**
     * Get the ZF2 translate helper
     * @return \Zend\I18n\Translator\TranslatorInterface
     */
    public function getTranslator()
    {
        if(null === $this->translator)
        {
            $this->translator = $this->getServiceLocator()->get('translator');
        }
        return $this->translator;
    }

    /**
     * Get the doctrine entity manager
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager($reinitialize = false)
    {
        if ( ! is_bool($reinitialize) ) {
            throw new \InvalidArgumentException();
        }

        if ($reinitialize === true) {
            $this->entitymanager = $this->getServiceLocator()->create('Doctrine\ORM\EntityManager');
        }

        if (null === $this->entitymanager) {
            $this->entitymanager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->entitymanager;
    }
}