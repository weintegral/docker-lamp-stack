<?php
declare(strict_types=1);

use App\utils\ObjectContainer;

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
            ],

            'employees' => [
                'controller' => ObjectContainer::employeeController(),
                'action' => 'listAction'
            ],
            'employees/1143' => [
                'controller' => ObjectContainer::employeeController(),
                'action' => 'getByIdAction'
            ],

            'offices' => [
                'controller' => ObjectContainer::officeController(),
                'action' => 'listAction'
            ],
            'offices/8' => [
                'controller' => ObjectContainer::officeController(),
                'action' => 'getByIdAction'
            ],

            'orders' => [
                'controller' => ObjectContainer::orderController(),
                'action' => 'listAction'
            ],
            'orders/1056' => [
                'controller' => ObjectContainer::orderController(),
                'action' => 'getByIdAction'
            ],

            'orderdetails' => [
                'controller' => ObjectContainer::orderDetailController(),
                'action' => 'listAction'
            ],
            'orderdetails/10' => [
                'controller' => ObjectContainer::orderDetailController(),
                'action' => 'getByIdAction'
            ],

            'payments' => [
                'controller' => ObjectContainer::paymentController(),
                'action' => 'listAction'
            ],
            'payments/1056' => [
                'controller' => ObjectContainer::paymentController(),
                'action' => 'getByIdAction'
            ],

            'products' => [
                'controller' => ObjectContainer::productController(),
                'action' => 'listAction'
            ],
            'products/112' => [
                'controller' => ObjectContainer::productController(),
                'action' => 'getByIdAction'
            ],

            'productlines' => [
                'controller' => ObjectContainer::productLineController(),
                'action' => 'listAction'
            ],
            'productlines/112' => [
                'controller' => ObjectContainer::productLineController(),
                'action' => 'getByIdAction'
            ],

        ],

        'POST' => [
            'customers' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'createAction'
            ],

            'employees' => [
                'controller' => ObjectContainer::employeeController(),
                'action' => 'createAction'
            ],

            'offices' => [
                'controller' => ObjectContainer::officeController(),
                'action' => 'createAction'
            ],

            'orders' => [
                'controller' => ObjectContainer::orderController(),
                'action' => 'createAction'
            ],

            'orderdetails' => [
                'controller' => ObjectContainer::orderDetailController(),
                'action' => 'createAction'
            ],
            'payments' => [
                'controller' => ObjectContainer::paymentModel(),
                'action' => 'createAction'
            ],
            'products'=> [
                'controller' => ObjectContainer::productController(),
                'action' => 'createAction'
            ],
            'productlines'=> [
                'controller' => ObjectContainer::productLineController(),
                'action' => 'createAction'
            ]
        ],
        'PUT' => [
            'customers' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'updateAction'
            ],

            'employees' => [
                'controller' => ObjectContainer::employeeController(),
                'action' => 'updateAction'
            ],

            'offices' => [
                'controller' => ObjectContainer::officeController(),
                'action' => 'updateAction'
            ],

            'orderdetails' => [
                'controller' => ObjectContainer::orderDetailController(),
                'action' => 'updateAction'
            ],

            'orders' => [
                'controller' => ObjectContainer::orderController(),
                'action' => 'updateAction'
            ],

            'payments' => [
                'controller' => ObjectContainer::paymentController(),
                'action' => 'updateAction'
            ],

            'products' => [
                'controller' => ObjectContainer::productController(),
                'action' => 'updateAction'
            ],

            'productlines' => [
                'controller' => ObjectContainer::productLineController(),
                'action' => 'updateAction'
            ],
        ],
        'PATCH' => [
            'customers' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'patchAction'
                ],
            'employees' => [
                'controller' => ObjectContainer::employeeController(),
                'action' => 'patchAction'
            ],
            'offices' => [
                'controller' => ObjectContainer::officeController(),
                'action' => 'patchAction'
            ],
            'orders' => [
                'controller' => ObjectContainer::orderController(),
                'action' => 'patchAction'
            ],
            'orderdetails' => [
                'controller' => ObjectContainer::orderDetailController(),
                'action' => 'patchAction'
            ],
            'payments' => [
                'controller' => ObjectContainer::paymentController(),
                'action' => 'patchAction'
            ],
            'products' => [
                'controller' => ObjectContainer::productController(),
                'action' => 'patchAction'
            ],
            'productlines' => [
                'controller' => ObjectContainer::productLineController(),
                'action' => 'patchAction'
            ],
        ],
        'DELETE' => [
            'customers/511' => [
                'controller' => ObjectContainer::customerController(),
                'action' => 'deleteAction'
            ],
            'employees/511' => [
                'controller' => ObjectContainer::employeeController(),
                'action' => 'deleteAction'
            ],
            'offices/511' => [
                'controller' => ObjectContainer::officeController(),
                'action' => 'deleteAction'
            ],
            'orders/511' => [
                'controller' => ObjectContainer::orderController(),
                'action' => 'deleteAction'
            ],
            'orderdetails/511' => [
                'controller' => ObjectContainer::orderDetailController(),
                'action' => 'deleteAction'
            ],
            'payments/511' => [
                'controller' => ObjectContainer::paymentController(),
                'action' => 'deleteAction'
            ],
            'products/511' => [
                'controller' => ObjectContainer::productController(),
                'action' => 'deleteAction'
            ],
            'productlines/511' => [
                'controller' => ObjectContainer::productLineController(),
                'action' => 'deleteAction'
            ],

        ]
    ];
}