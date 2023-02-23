<?php
declare(strict_types = 1);

$productControllerObj = ObjectContainer::productController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $productControllerObj->listAction();
        die;
    }
    echo $productControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $productControllerObj->createAction();
    die;
}