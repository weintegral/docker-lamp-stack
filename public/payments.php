<?php


declare(strict_types=1);
require 'MySQLDatabase.php';
require 'Payment.php';
require 'Response.php';

//echo 'Printing';
$database = new MySQLDatabase();
$payment = new Payment($database);
$output = $payment->findById(124);
$response = new Response();

$response->toJson($output);