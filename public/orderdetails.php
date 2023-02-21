<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'OrderDetail.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedOrderDetailId = (int)$_GET['orderDetailId'];
        $database = new MySQLDatabase();
        $orderDetail = new OrderDetail($database);
        $output = $orderDetail->findById($userProvidedOrderDetailId);
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
        $orderDetail = new OrderDetail($database);
        $orderDetail->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}
