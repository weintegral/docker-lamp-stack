<?php
declare(strict_types = 1);

/*
|--------------------------------------------------------------------------
| Front End Controller
|--------------------------------------------------------------------------
|
| File responsible for accepting all requests coming into our application.
|
*/

use App\utils\ObjectContainer;

require '../vendor/autoload.php';
require_once 'routes.php';
require_once 'globalUtils.php';


/*
|--------------------------------------------------------------------------
| Identifying type of routes
|--------------------------------------------------------------------------
*/
$requestObj = ObjectContainer::request();
$routes = getRoutes();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');

/*
|--------------------------------------------------------------------------
| Serving customer routes
|--------------------------------------------------------------------------
*/
if($isCustomerRequest) {
    $customerControllerObj = ObjectContainer::customerController();
    /**
     * If the request is of GET type
     */
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());

        /**
         * If routes does not contain any customer id
         * EXAMPLE: /customers
         */
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['customers']['controller'];
            $controllerActionMethod = $routes['GET']['customers']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }

        /**
         * If routes contain any customer id
         * EXAMPLE: /customers/123
         */
        $controllerObj = $routes['GET']['customers/112']['controller'];
        $controllerActionMethod = $routes['GET']['customers/112']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    /**
     * If the request is of POST type
     */
    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['customers']['controller'];
        $controllerActionMethod = $routes['POST']['customers']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    /**
     * If the request is of PUT type
     */
    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['customers']['controller'];
        $controllerActionMethod = $routes['PUT']['customers']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    /**
     * If the request is of PATCH type
     */
    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['customers']['controller'];
        $controllerActionMethod = $routes['PATCH']['customers']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    /**
     * If the request is of DELETE type
     */
    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['customers/511']['controller'];
        $controllerActionMethod = $routes['DELETE']['customers/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

/*
|--------------------------------------------------------------------------
| Serving employee routes
|--------------------------------------------------------------------------
*/
if($isEmployeeRequest) {
    require_once 'employees.php';
}
