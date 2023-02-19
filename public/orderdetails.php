<?php


declare(strict_types=1);
require 'MySQLDatabase.php';
require 'OrderDetail.php';
require 'Response.php';

$database = new MySQLDatabase();
$orderrrrr= new OrderDetail($database);
$output = $orderrrrr->findById(10100);
$response = new Response();

$response->toJson($output);