<?php
declare(strict_types = 1);
require_once 'MySQLDatabase.php';
require_once 'Payment.php';
require_once 'Response.php';

$database = new MySQLDatabase();
$payment = new Payment($database);
$output = $payment->findAll();
$response = new Response();
$response->toJson($output);


