<?php
declare(strict_types = 1);
require_once 'Request.php';
require_once 'MySQLDatabase.php';
require_once 'ProductLine.php';
require_once 'Response.php';
require_once 'Debug.php';

$requestObj = new Request();
$response = new Response();

if ($requestObj->getRequestType() === 'GET') {
    try {
        $urlPath= $requestObj->getRequestPath();
        $urlPathData = explode( '/', $urlPath);
        $database = new MySQLDatabase();
        $productline = new ProductLine($database);
        if (!isset($urlPathData[2]))
        {
            $output = $productline->findAll();
            $response->toJson($output);
        }
        $userProvidedProductLineId =(string)$urlPathData[2];
        $output = $productline->findById($userProvidedProductLineId);
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
        $productline = new ProductLine($database);
        $productline->insert($userProvidedData);
        $response->setResponseCode(200)
            ->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}