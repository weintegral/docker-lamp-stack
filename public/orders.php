<?php


declare(strict_types=1);
require 'MySQLDatabase.php';
require 'Order.php';
require 'Response.php';

//echo 'Printing';
$database = new MySQLDatabase();
$order = new Order($database);
$output = $order->findById(10105);
$response = new Response();

$response->toJson($output);