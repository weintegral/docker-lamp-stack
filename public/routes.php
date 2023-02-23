<?php
require_once 'utils/ObjectContainer.php';

function getRoutes(): array
{
    return [
        'GET' => [
            'customers' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'listAction'
            ],
            'customers/112' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'getByIdAction'
            ]
        ],
        'POST' => [
            'customers' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'createAction'
            ],
        ],
        'PUT' => [
            'customers' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'updateAction'
            ],
        ],
        'PATCH' => [],
        'DELETE' => [
            'customers/511' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'deleteAction'
            ],
        ]
    ];
}