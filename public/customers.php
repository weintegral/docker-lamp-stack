<?php
declare(strict_types = 1);
require_once 'Request.php';
require_once 'MySQLDatabase.php';
require_once 'Customer.php';
require_once 'Response.php';
require_once 'Debug.php';

$requestObj = new Request();
$response = new Response();

if ($requestObj->getRequestType() === 'GET') {
    try {
        $urlPath= $requestObj->getRequestPath();
        $urlPathData = explode( '/', $urlPath);
        $database = new MySQLDatabase();
        $customer = new Customer($database);
        if (!isset($urlPathData[2]))
        {
            $output = $customer->findAll();
            $response->toJson($output);
        }
        $userProvidedCustomerId =(int)$urlPathData[2];
        $output = $customer->findById($userProvidedCustomerId);
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
        $customer = new Customer($database);
        $customer->insert($userProvidedData);
        $response->setResponseCode(200)
            ->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}