<?php

namespace Admin\Form;

use Application\Form\AbstractForm;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class LoginForm extends AbstractForm
{

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setAttribute('method', 'post');
//        $this->setAttribute('class', 'form-horizontal');
    }

    public function init()
    {
        $this->setName('Login');

        $this->add([
            'name'       => 'email',
            'type'       => 'text',
            'options'    => [
                'label'            => _('Email'),
                'label_attributes' => [
                    'class' => 'bold',
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'       => 'password',
            'type'       => 'password',
            'options'    => [
                'label'            => _('Password'),
                'label_attributes' => [
                    'class' => 'bold',
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'       => 'submit',
            'type'       => 'submit',
            'attributes' => [
                'class' => 'btn btn-success',
                'value' => _('Save'),
            ]
        ]);

        return $this;
    }

}
