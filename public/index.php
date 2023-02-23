<?php
declare(strict_types = 1);

require_once 'utils/ObjectContainer.php';
require_once 'utils/globalUtils.php';
require_once 'routes.php';

$requestObj = ObjectContainer::request();
$routes = getRoutes();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');

if($isCustomerRequest) {
    $customerControllerObj = ObjectContainer::customerController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['customers']['controller'];
            $controllerActionMethod = $routes['GET']['customers']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['customers/112']['controller'];
        $controllerActionMethod = $routes['GET']['customers/112']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['customers']['controller'];
        $controllerActionMethod = $routes['POST']['customers']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['customers']['controller'];
        $controllerActionMethod = $routes['PUT']['customers']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['customers/511']['controller'];
        $controllerActionMethod = $routes['DELETE']['customers/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

if($isEmployeeRequest) {
    require_once 'employees.php';
}
