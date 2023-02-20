<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'OrderDetail.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$orderdetail = new OrderDetail($database);
$output = $orderdetail->findAll();
$response = new Response();
$response->toJson($output);
