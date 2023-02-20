<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'ProductLine.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$productLine = new ProductLine($database);
$output = $productLine->findAll();
$response = new Response();
$response->toJson($output);



