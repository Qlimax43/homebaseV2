<?php

namespace Admin;

return [
    'controllers'     => [
        'invokables' => [
            'Admin\Controller\IndexController'  => 'Admin\Controller\IndexController',
            'Admin\Controller\UserController'   => 'Admin\Controller\UserController',
            'Admin\Controller\PersonController' => 'Admin\Controller\PersonController',
            'Admin\Controller\AjaxController'   => 'Admin\Controller\AjaxController',
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
        'factories'          => [
            'translator'            => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'Admin\Form\PersonForm' => 'Admin\Form\Factory\PersonFormFactory',
        ],
    ],
    'form_elements'   => [
        'factories' => [
            'Admin\Form\PersonForm' => 'Admin\Form\Factory\PersonFormFactory',
        ],
    ],
    'view_helpers'    => [
        'invokables' => [
            'personIcon' => 'Admin\View\Helper\PersonIconHelper',
        ],
    ],
    'view_manager'    => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'],
            ],
            'orm_default'             => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
    'router'          => [
        'routes' => [
            'ajax'  => [
                'type'          => 'Segment',
                'options'       => [
                    'route'    => '/ajax',
                    'defaults' => [
                        'controller' => 'Admin\Controller\AjaxController',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'file' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/file/:fileId',
                            'defaults' => [
                                'controller' => 'Admin\Controller\AjaxController',
                                'action'     => 'file',
                            ],
                        ],
                    ],
                ],
            ],
            'admin' => [
                'type'          => 'Segment',
                'options'       => [
                    'route'    => '/admin',
                    'defaults' => [
                        'controller' => 'Admin\Controller\IndexController',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'person' => [
                        'type'          => 'Segment',
                        'options'       => [
                            'route'    => '/person',
                            'defaults' => [
                                'controller' => 'Admin\Controller\PersonController',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes'  => [
                            'add'    => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/add[/]',
                                    'defaults' => [
                                        'controller' => 'Admin\Controller\PersonController',
                                        'action'     => 'add',
                                    ],
                                ],
                            ],
                            'edit'   => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/edit/:personId',
                                    'defaults' => [
                                        'controller' => 'Admin\Controller\PersonController',
                                        'action'     => 'edit',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/delete/:personId',
                                    'defaults' => [
                                        'controller' => 'Admin\Controller\PersonController',
                                        'action'     => 'delete',
                                    ],
                                ],
                            ]
                        ]
                    ],
                    'user'   => [
                        'type'          => 'Segment',
                        'options'       => [
                            'route'    => '/user[/]',
                            'defaults' => [
                                'controller' => 'Admin\Controller\UserController',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes'  => [
                            'add'    => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/add[/]',
                                    'defaults' => [
                                        'controller' => 'Admin\Controller\UserController',
                                        'action'     => 'add',
                                    ],
                                ],
                            ],
                            'edit'   => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/edit[/:userId][/]',
                                    'defaults' => [
                                        'controller' => 'Admin\Controller\UserController',
                                        'action'     => 'edit',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type'    => 'Segment',
                                'options' => [
                                    'route'    => '/delete[/:userId][/]',
                                    'defaults' => [
                                        'controller' => 'Admin\Controller\UserController',
                                        'action'     => 'delete',
                                    ],
                                ],
                            ]
                        ]
                    ],
                ]
            ],
        ],
    ],
    'translator'      => [
        'locale'                    => 'en_US',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ],
        ],
    ],
];
