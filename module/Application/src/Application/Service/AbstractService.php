<?php

namespace Application\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

abstract class AbstractService implements ServiceManagerAwareInterface, EventManagerAwareInterface
{
	protected $entityManager;
	protected $serviceManager;
	protected $eventManager;
	protected $translator;

	/**
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager()
	{
		if(is_null($this->entityManager))
		{
			$this->entityManager = $this->getServiceManager()->get('Doctrine\ORM\EntityManager');
		}
		return $this->entityManager;
	}

	/**
	 * @param ServiceManager $serviceManager
	 *
	 * @return AbstractService
	 */
	public function setServiceManager(ServiceManager $serviceManager)
	{
		$this->serviceManager = $serviceManager;
		return $this;
	}

	/**
	 * @return ServiceManager
	 */
	public function getServiceManager()
	{
		return $this->serviceManager;
	}

	/**
	 * @param  EventManagerInterface $eventManager
	 *
	 * @return AbstractService
	 */
	public function setEventManager(EventManagerInterface $eventManager)
	{
		$this->eventManager = $eventManager;
		return $this;
	}

	/**
	 * @return EventManagerInterface
	 */
	public function getEventManager()
	{
		return $this->eventManager;
	}

	public function getTranslator()
	{
		if(is_null($this->translator))
		{
			$translator = $this->getServiceManager()->get('translator');
			$this->translator = $translator;
		}
		return $this->translator;
	}


}

