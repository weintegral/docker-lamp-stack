<?php
declare(strict_types = 1);

$officeControllerObj = ObjectContainer::officeController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $officeControllerObj->listAction();
        die;
    }
    echo $officeControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $officeControllerObj->createAction();
    die;
}