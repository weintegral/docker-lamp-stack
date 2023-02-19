<?php

declare(strict_types=1);
require 'MySQLDatabase.php';
require 'Office.php';
require 'Response.php';

//echo 'Printing';
$database = new MySQLDatabase();
$office = new Office($database);
$output = $office->findById(5  );
$response = new Response();

$response->toJson($output);
