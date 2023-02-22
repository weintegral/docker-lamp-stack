<?php

declare(strict_types = 1);

require 'MySQLDatabase.php';
require 'Customer.php';
require 'Response.php';

/**
 * C.R.U.D
 * C: Create (POST)
 * R: Read (GET)
 * U: Update (PUT, PATCH)
 * D: Delete (DELETE)
 */



$response = new Response();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedCustomerId = (int)$_GET['customerId'];
        $database = new MySQLDatabase();
        $customer = new OrderDetail($database);
        $output = $customer->findById($userProvidedCustomerId);
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
        $customer = new OrderDetail($database);
        $customer->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}

