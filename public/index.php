<?php
declare(strict_types = 1);

require_once 'utils/ObjectContainer.php';
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

$requestObj = ObjectContainer::request();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');
$isOfficeRequest = str_contains($requestObj->getRequestPath(), 'offices');
$isOrderDetailRequest = str_contains($requestObj->getRequestPath(), 'orderdetails');
$isOrderRequest = str_contains($requestObj->getRequestPath(), 'orders');
$isPaymentRequest = str_contains($requestObj->getRequestPath(), 'payments');
$isProductLineRequest = str_contains($requestObj->getRequestPath(), 'productlines');
$isProductRequest = str_contains($requestObj->getRequestPath(), 'products');

if($isCustomerRequest) {
    require_once 'customers.php';
}

if($isEmployeeRequest) {
    require_once 'employees.php';
}

if($isOfficeRequest) {
    require_once 'offices.php';
}

if($isOrderDetailRequest) {
    require_once 'orderdetails.php';
}

if($isOrderRequest) {
    require_once 'orders.php';
}

if($isPaymentRequest) {
    require_once 'payments.php';
}

if($isProductLineRequest) {
    require_once 'productlines.php';
}

if($isProductRequest) {
    require_once 'products.php';
}
