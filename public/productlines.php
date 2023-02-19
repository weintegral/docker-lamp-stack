<?php


declare(strict_types=1);
require 'MySQLDatabase.php';
require 'ProductLine.php';
require 'Response.php';

//echo 'Printing';
$database = new MySQLDatabase();
$productLines= new ProductLine($database);
$output = $productLines->findById('Ships');
$response = new Response();

$response->toJson($output);