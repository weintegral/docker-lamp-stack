<?php
declare(strict_types = 1);

$orderdetailControllerObj = ObjectContainer::orderDetailController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $orderdetailControllerObj->listAction();
        die;
    }
    echo $orderdetailControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $orderdetailControllerObj->createAction();
    die;
}