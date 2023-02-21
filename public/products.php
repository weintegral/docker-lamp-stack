<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Product.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedProductId = (string)$_GET['productId'];
        $database = new MySQLDatabase();
        $product = new Product($database);
        $output = $product->findById($userProvidedProductId);
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
        $product = new Product($database);
        $product->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}
