<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return [
            'factories'            => [
                'Admin\Form\PersonForm' => function($sm)
                {
                    $form = new Form\PersonForm('person');
                    $form->setServiceManager($sm);
                    return $form;
                },
                'Admin\Form\LoginForm' => function($sm)
                {
                    $form = new Form\LoginForm('login');
                    $form->setServiceManager($sm);
                    $form->init();
                    return $form;
                },
                'Admin\Service\FileService' => function ($sm)
                {
                    $service = new \Admin\Service\FileService();
                    $service->setServiceManager($sm);
                    return $service;
                },
                'Admin\Storage\AuthenticationStorage' => function($sm)
                {
                    return new Admin\Storage\AuthenticationStorage();
                },
                'Admin\Service\AuthenticationService' => function($sm)
                {
                    $service = new Service\AuthenticationService();
                    return $service;
                },
            ]
        ];
    }

}
