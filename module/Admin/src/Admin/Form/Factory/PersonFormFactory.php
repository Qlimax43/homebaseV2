<?php

namespace Admin\Form\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PersonFormFactory implements FactoryInterface
{

	public function createService(ServiceLocatorInterface $sl)
	{
        $entityManager = $sl->get('doctrine.entitymanager.orm_default');
        
		$form = new \Admin\Form\PersonForm('person');
		$form->setInputFilter(new \Admin\Form\PersonFilter($entityManager));
		$form->setServiceManager($sl);
        $form->init();
		return $form;
	}

}