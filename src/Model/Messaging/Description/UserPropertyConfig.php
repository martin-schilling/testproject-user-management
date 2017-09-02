<?php

declare(strict_types = 1);

namespace App\Model\Messaging\Description;

interface UserPropertyConfig 
{
    const PROPERTY_CONFIG = [
        'userId' => [
            'type' => 'string',
            'pattern' => '^[A-Za-z0-9-]{36}$'
        ],
        'gender' => [
            'type' => 'string',
            'enum' => ['male', 'female']
        ],
        'firstName' => [
            'type' => 'string',
            'minLength' => 1
        ],
        'lastName' => [
            'type' => 'string',
            'minLength' => 1
        ],
        'username' => [
            'type' => 'string',
            'minLength' => 3
        ],
        'password' => [
            'type' => 'string',
            'minLength' => 8
        ],
        'activated' => [
            'type' => 'boolean'
        ],
        'blocked' => [
            'type' => 'boolean'
        ],
        'address' => [
            'anyOf' => [
                [
                    'type' => 'null'
                ], [
                    'type' => 'object',
                    'properties' => [
                        'street' => [
                            'type' => 'string',
                            'mingLength' => 1
                        ],
                        'zipcode' => [
                            'type' => 'string',
                            'minLength' => 1
                        ],
                        'city' => [
                            'type' => 'string',
                            'minLength' => 1
                        ],
                        'country' => [
                            'type' => 'string',
                            'pattern' => '^[A-Z]{2}$'
                        ]
                    ],
                    'additionalProperties' => false
                ]
            ]
        ]
    ];
}
