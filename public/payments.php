<?php
declare(strict_types = 1);

$paymentControllerObj = ObjectContainer::paymentController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $paymentControllerObj->listAction();
        die;
    }
    echo $paymentControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $paymentControllerObj->createAction();
    die;
}