<?php


declare(strict_types=1);
require 'MySQLDatabase.php';
require 'Product.php';
require 'Response.php';

//echo 'Printing';
$database = new MySQLDatabase();
$product = new Product($database);
$output = $product->findById('S12_1108');
$response = new Response();

$response->toJson($output);