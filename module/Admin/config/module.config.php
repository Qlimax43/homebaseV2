<?php

namespace Admin;

$notLoggedIn = [
    'navigation' => [
        'default' => [
            'login' => [
                'label' => 'Login',
                'route' => 'auth/login',
                'class' => 'pull-right',
            ],
        ],
    ]
];

$loggedIn = [
    'navigation' => [
        'default' => [
            'admin' => [
                'label' => 'Admin',
                'route' => 'admin',
                'class' => 'pull-right',
            ]
        ],
    ],
];

$config = [
    'controllers'     => [
        'invokables' => [
            'Admin\Controller\IndexController'  => 'Admin\Controller\IndexController',
            'Admin\Controller\UserController'   => 'Admin\Controller\UserController',
            'Admin\Controller\PersonController' => 'Admin\Controller\PersonController',
            'Admin\Controller\AuthController'   => 'Admin\Controller\AuthController',
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
            'auth'  => [
                'type'          => 'Segment',
                'options'       => [
                    'route'    => '/auth',
                    'defaults' => [
                        'controller' => 'Admin\Controller\AuthController',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'login' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/login[/]',
                            'defaults' => [
                                'controller' => 'Admin\Controller\AuthController',
                                'action'     => 'login',
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

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
{
    return array_merge_recursive($config, $loggedIn);
}
else
{
    return array_merge_recursive($config, $notLoggedIn);
}