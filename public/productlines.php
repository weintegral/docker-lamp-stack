<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'ProductLine.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedProductLineId = (string)$_GET['productLineId'];
        $database = new MySQLDatabase();
        $productLine = new ProductLine($database);
        $output = $productLine->findById($userProvidedProductLineId);
        $response->toJson($output);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'Database issue']);
    }
    catch (LogicException $exception) {
        $response->toJson(['status' => 'logic issue']);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $json = file_get_contents('php://input');
        $userProvidedData = (array)json_decode($json);
        $database = new MySQLDatabase();
        $productLine = new ProductLine($database);
        $productLine->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}
