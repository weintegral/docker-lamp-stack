<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Payment.php';
require_once 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedPayment = (int)$_GET['paymentId'];
        $database = new MySQLDatabase();
        $payments = new Payment($database);
        $output = $payments->findById($userProvidedPayment);
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
        $payments = new Payment($database);
        $payments->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}
