<?php
declare(strict_types = 1);

require_once 'utils/ObjectContainer.php';

$requestObj = ObjectContainer::request();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');
$isOfficeRequest = str_contains($requestObj->getRequestPath(), 'offices');
$isOrderRequest = str_contains($requestObj->getRequestPath(), 'orders');
$isOrderDetailRequest = str_contains($requestObj->getRequestPath(), 'orderdetails');
$isPaymentRequest = str_contains($requestObj->getRequestPath(), 'payments');
$isProductRequest = str_contains($requestObj->getRequestPath(), 'products');
$isProductLineRequest = str_contains($requestObj->getRequestPath(), 'productlines');

if($isCustomerRequest) {
    require_once 'customers.php';
}

if($isEmployeeRequest) {
    require_once 'employees.php';
}

if($isOfficeRequest) {
    require_once 'offices.php';
}

if($isOrderRequest) {
    require_once 'orders.php';
}

if($isOrderDetailRequest) {
    require_once 'orderdetails.php';
}

if($isPaymentRequest) {
    require_once 'payments.php';
}

if($isProductRequest) {
    require_once 'products.php';
}

if($isProductLineRequest) {
    require_once 'productlines.php';
}