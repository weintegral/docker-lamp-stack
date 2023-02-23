<?php
declare(strict_types = 1);

$productLineControllerObj = ObjectContainer::productLineController();
$requestObj = ObjectContainer::request();

if ($requestObj->getRequestType() === 'GET') {
    $urlPathData = explode( '/', $requestObj->getRequestPath());
    if (!isset($urlPathData[2]))
    {
        echo $productLineControllerObj->listAction();
        die;
    }
    echo $productLineControllerObj->getByIdAction();
    die;
}

if ($requestObj->getRequestType() === 'POST') {
    echo $productLineControllerObj->createAction();
    die;
}