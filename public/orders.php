<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Order.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$order = new Order($database);
$output = $order->findAll();
$response = new Response();
$response->toJson($output);

