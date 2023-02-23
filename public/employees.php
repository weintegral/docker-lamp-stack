<?php
declare(strict_types = 1);

$employeeControllerObj = ObjectContainer::employeeController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $employeeControllerObj->listAction();

        die;
    }
    echo $employeeControllerObj->getByIdAction();

    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $employeeControllerObj->createAction();

    die;
}