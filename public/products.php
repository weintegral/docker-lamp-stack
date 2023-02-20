<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Product.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$product = new Product($database);
$output = $product->findAll();
$response = new Response();
$response->toJson($output);



