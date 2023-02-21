<?php

declare(strict_types=1);
require 'MySQLDatabase.php';
require 'Office.php';
require 'Response.php';

$response = new Response();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $userProvidedOfficeId = (int)$_GET['officeId'];
        $database = new MySQLDatabase();
        $office = new Office($database);
        $output = $office->findById($userProvidedOfficeId);
        $response->toJson($output);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'Database issue']);
    }
    catch (LogicException $exception) {
        $response->toJson(['status' => 'logic issue']);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $json = file_get_contents('php://input');
        $userProvidedData = (array)json_decode($json);
        $database = new MySQLDatabase();
        $office = new Office($database);
        $office->insert($userProvidedData);
        $response->toJson(['status' => 'success']);
    } catch (PDOException $exception) {
        $response->toJson(['status' => 'failure']);
    }
}
