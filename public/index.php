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
