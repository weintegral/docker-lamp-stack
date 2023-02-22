<?php
declare(strict_types = 1);
require_once 'Request.php';
require_once 'MySQLDatabase.php';
require_once 'Order.php';
require_once 'Response.php';
require_once 'Debug.php';

$requestObj = new Request();
$response = new Response();

if ($requestObj->getRequestType() === 'GET') {
    try {
        $urlPath= $requestObj->getRequestPath();
        $urlPathData = explode( '/', $urlPath);
        $database = new MySQLDatabase();
        $order = new Order($database);
        if (!isset($urlPathData[2]))
        {
            $output = $order->findAll();
            $response->toJson($output);
        }
        $userProvidedOrderId =(int)$urlPathData[2];
        $output = $order->findById($userProvidedOrderId);
        $response->toJson($output);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'Database issue']);
    } catch (InvalidArgumentException $exception) {
        $response->toJson(['status' => $exception->getMessage()]);
    }
}

if ($requestObj->getRequestType() === 'POST') {
    try {
        $userProvidedData = $requestObj->getRequestBody();
        $database = new MySQLDatabase();
        $order = new Order($database);
        $order->insert($userProvidedData);
        $response->setResponseCode(200)
            ->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}