<?php
declare(strict_types = 1);
require_once 'Request.php';
require_once 'MySQLDatabase.php';
require_once 'Product.php';
require_once 'Response.php';
require_once 'Debug.php';

$requestObj = new Request();
$response = new Response();

if ($requestObj->getRequestType() === 'GET') {
    try {
        $urlPath= $requestObj->getRequestPath();
        $urlPathData = explode( '/', $urlPath);
        $database = new MySQLDatabase();
        $product = new Product($database);
        if (!isset($urlPathData[2]))
        {
            $output = $product->findAll();
            $response->toJson($output);
        }
        $userProvidedProductId =(string)$urlPathData[2];
        $output = $product->findById($userProvidedProductId);
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
        $product = new Product($database);
        $product->insert($userProvidedData);
        $response->setResponseCode(200)
            ->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}