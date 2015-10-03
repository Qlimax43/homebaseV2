<?php

namespace Admin\Form;

use Application\Form\AbstractForm;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class PersonForm extends AbstractForm
{

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setAttribute('method', 'post');
//        $this->setAttribute('class', 'form-horizontal');
    }

    public function init()
    {
        $this->setName('Person');
        $this->setHydrator(new DoctrineHydrator($this->getEntityManager(), true));
        $this->setObject(new \Application\Entity\Person());

        $this->add([
            'name'       => 'firstname',
            'type'       => 'text',
            'options'    => [
                'label'            => _('Firstname'),
                'label_attributes' => [
                    'class' => 'bold',
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'       => 'middlename',
            'type'       => 'text',
            'options'    => [
                'label'            => _('Middlename'),
                'label_attributes' => [
                    'class' => 'bold',
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'       => 'lastname',
            'type'       => 'text',
            'options'    => [
                'label'            => _('Lastname'),
                'label_attributes' => [
                    'class' => 'bold',
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'       => 'birthdate',
            'type'       => 'date',
            'options'    => [
                'format' =>  'd-m-Y',
                'label'            => _('Birthdate'),
                'label_attributes' => [
                    'class' => 'bold',
                ]
            ],
            'attributes' => [
                'class' => 'form-control datepicker',
                'step'  => 'any',
            ],
        ]);

        $this->add([
            'name'       => 'deleted',
            'type'       => 'date',
            'options'    => [
                'format' =>  'd-m-Y',
                'label'            => _('Deleted'),
                'label_attributes' => [
                    'class' => 'bold',
                ],
            ],
            'attributes' => [
                'class' => 'form-control datepicker'
            ],
        ]);
        
        $this->add([
            'name'       => 'file',
            'type'       => 'file',
            'options'    => [
                'format' =>  'd-m-Y',
                'label'            => _('Avatar'),
                'label_attributes' => [
                    'class' => 'bold',
                ],
            ],
            'attributes' => [
                'class' => 'form-control btn '
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
