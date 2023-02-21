<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Order.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedOrderId = (int)$_GET['orderId'];
        $database = new MySQLDatabase();
        $order = new Order($database);
        $output = $order->findById($userProvidedOrderId);
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
        $order = new Order($database);
        $order->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}
