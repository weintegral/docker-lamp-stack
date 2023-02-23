<?php
declare(strict_types = 1);

$orderControllerObj = ObjectContainer::orderController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $orderControllerObj->listAction();
        die;
    }
    echo $orderControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $orderControllerObj->createAction();
    die;
}