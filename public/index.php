<?php
declare(strict_types = 1);
require_once 'Request.php';

/**
* C.R.U.D
* C: Create (POST)
    * R: Read (GET)
* U: Update (PUT, PATCH)
* D: Delete (DELETE)
*/

/**
* TOPICS that are covered
*
* PHP built in Web server
* defining variables
* SUPER GLOBAL Variables
* data types in PHP
* PDO Object
* PDO Options
* Error Handling
* Debugging and Printing in PHP
* loops in PHP
* Namespaces
* Request and Response Headers
* HTTP Methods
* HTTP Status Codes
*/

$requestObj = new Request();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');

if($isCustomerRequest) {
require_once 'customers.php';
}

$requestObj = new Request();
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');

if($isEmployeeRequest) {
    require_once 'employees.php';
}

$requestObj = new Request();
$isOrderRequest = str_contains($requestObj->getRequestPath(), 'orders');

if($isOrderRequest) {
    require_once 'orders.php';
}

$requestObj = new Request();
$isOrderDetailRequest = str_contains($requestObj->getRequestPath(), 'orderdetails');

if($isOrderDetailRequest) {
    require_once 'orderdetails.php';
}

$requestObj = new Request();
$isOfficeRequest = str_contains($requestObj->getRequestPath(), 'offices');

if($isOfficeRequest) {
    require_once 'offices.php';
}

$requestObj = new Request();
$isPaymentRequest = str_contains($requestObj->getRequestPath(), 'payments');

if($isPaymentRequest) {
    require_once 'payments.php';
}

$requestObj = new Request();
$isProductRequest = str_contains($requestObj->getRequestPath(), 'products');

if($isProductRequest) {
    require_once 'products.php';
}

$requestObj = new Request();
$isProductLinesRequest = str_contains($requestObj->getRequestPath(), 'productlines');

if($isProductLinesRequest) {
    require_once 'productlines.php';
}

