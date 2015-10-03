<?php

namespace Admin\Form;

use Zend\InputFilter\InputFilter;

class PersonFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name'       => 'firstname',
            'required'   => true,
            'filters'    => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => [
                        'messages' => [\Zend\Validator\NotEmpty::IS_EMPTY => _('This field is mandatory')],
                    ]
                ],
            ]
        ]);

        $this->add([
            'name'       => 'middlename',
            'required'   => false,
            'filters'    => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => [
                        'messages' => [\Zend\Validator\NotEmpty::IS_EMPTY => _('This field is mandatory')],
                    ]
                ],
            ]
        ]);

        $this->add([
            'name'       => 'lastname',
            'required'   => true,
            'filters'    => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => [
                        'messages' => [\Zend\Validator\NotEmpty::IS_EMPTY => _('This field is mandatory')],
                    ]
                ],
            ]
        ]);

        $this->add([
            'name'       => 'birthdate',
            'required'   => true,
            'filters'    => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name'    => 'NotEmpty',
                    'options' => [
                        'messages' => [\Zend\Validator\NotEmpty::IS_EMPTY => _('This field is mandatory')],
                    ]
                ],
                [
                    'name'    => 'Date',
                    'options' => [
                        'format'   => 'd-m-Y',
                        'messages' => [\Zend\Validator\Date::INVALID_DATE => _('This field is not a valid date')]
                    ]
                ]
            ]
        ]);
        $this->add([
            'name'       => 'deleted',
            'required'   => false,
            'filters'    => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                [
                    'name'    => 'Date',
                    'options' => [
                        'format'   => 'd-m-Y',
                        'messages' => [\Zend\Validator\Date::INVALID_DATE => _('This field is not a valid date')]
                    ]
                ]
            ]
        ]);
    }

}
