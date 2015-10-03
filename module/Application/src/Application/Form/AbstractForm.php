<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class AbstractForm extends Form implements ServiceManagerAwareInterface
{

	protected $serviceManager;
	protected $entityManager;

	public function setServiceManager(ServiceManager $serviceManager)
	{
		$this->serviceManager = $serviceManager;
		return $this;
	}

	public function getServiceManager()
	{
		return $this->serviceManager;
	}

	/**
	 * @return Doctrine\Common\Persistence\ObjectManager
	 */
	public function getEntityManager()
	{
		if(is_null($this->entityManager))
		{
			$this->entityManager = $this->getServiceManager()->get('doctrine.entitymanager.orm_default');
		}
		return $this->entityManager;
	}

	/**
	 * Use after Zend\Form\Form::isValid() has returned FALSE 
	 * but you want to show the form again with the original user data
	 * 
	 * By default your object will not be hydrated (cuz invalid)
	 * It *may* be handy to hydrate parts of your object manually, depending on you you implement your fieldsets
	 */
	public function rebindInvalidForm()
	{
		$this->bind($this->getObject());
		$this->setData($this->getInputFilter()->getRawValues());
	}
}
