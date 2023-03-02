<?php
declare(strict_types = 1);

use App\utils\ObjectContainer;


require '../vendor/autoload.php';
require_once 'routes.php';
require_once 'globalUtils.php';

$requestObj = ObjectContainer::request();
$routes = getRoutes();
$isCustomerRequest = str_contains($requestObj->getRequestPath(), 'customers');
$isEmployeeRequest = str_contains($requestObj->getRequestPath(), 'employees');
$isOfficeRequest = str_contains($requestObj->getRequestPath(), 'offices');
$isOrderRequest = str_contains($requestObj->getRequestPath(), 'orders');
$isOrderDetailRequest = str_contains($requestObj->getRequestPath(), 'orderdetails');
$isPaymentRequest = str_contains($requestObj->getRequestPath(), 'payments');
$isProductRequest = str_contains($requestObj->getRequestPath(), 'products');
$isProductLinesRequest = str_contains($requestObj->getRequestPath(), 'productlines');

//CustomerRequest
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

    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['customers']['controller'];
        $controllerActionMethod = $routes['PATCH']['customers']['action'];
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

// EmployeeRequest
if($isEmployeeRequest) {
    $employeesControllerObj = ObjectContainer::employeeController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['employees']['controller'];
            $controllerActionMethod = $routes['GET']['employees']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['employees/1143']['controller'];
        $controllerActionMethod = $routes['GET']['employees/1143']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['employees']['controller'];
        $controllerActionMethod = $routes['POST']['employees']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['employees']['controller'];
        $controllerActionMethod = $routes['PUT']['employees']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['employees']['controller'];
        $controllerActionMethod = $routes['PATCH']['employees']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['employees/511']['controller'];
        $controllerActionMethod = $routes['DELETE']['employees/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

//OfficeRequest
if($isOfficeRequest) {
    $officeControllerObj = ObjectContainer::officeController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode('/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2])) {
            $controllerObj = $routes['GET']['offices']['controller'];
            $controllerActionMethod = $routes['GET']['offices']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['offices/8']['controller'];
        $controllerActionMethod = $routes['GET']['offices/8']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['offices']['controller'];
        $controllerActionMethod = $routes['POST']['offices']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['offices']['controller'];
        $controllerActionMethod = $routes['PUT']['offices']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['offices']['controller'];
        $controllerActionMethod = $routes['PATCH']['offices']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['offices/511']['controller'];
        $controllerActionMethod = $routes['DELETE']['offices/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

//OrderRequest
if($isOrderRequest) {
    $orderControllerObj = ObjectContainer::OrderController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['orders']['controller'];
            $controllerActionMethod = $routes['GET']['orders']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['orders/1056']['controller'];
        $controllerActionMethod = $routes['GET']['orders/1056']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['orders']['controller'];
        $controllerActionMethod = $routes['POST']['orders']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['orders']['controller'];
        $controllerActionMethod = $routes['PUT']['orders']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['orders']['controller'];
        $controllerActionMethod = $routes['PATCH']['orders']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['orders/']['controller'];
        $controllerActionMethod = $routes['DELETE']['orders/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

//OrderDetailRequest
if($isOrderDetailRequest) {
    $orderDetailsControllerObj = ObjectContainer::OrderDetailController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['orderdetails']['controller'];
            $controllerActionMethod = $routes['GET']['orderdetails']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['orderdetails/10']['controller'];
        $controllerActionMethod = $routes['GET']['orderdetails/10']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['orderdetails']['controller'];
        $controllerActionMethod = $routes['POST']['orderdetails']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['orderdetails']['controller'];
        $controllerActionMethod = $routes['PUT']['orderdetails']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['orderdetails']['controller'];
        $controllerActionMethod = $routes['PATCH']['orderdetails']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['orderdetails/']['controller'];
        $controllerActionMethod = $routes['DELETE']['orderdetails/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

//PaymentRequest
if($isPaymentRequest) {
    $paymentControllerObj = ObjectContainer::PaymentController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['payments']['controller'];
            $controllerActionMethod = $routes['GET']['payments']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['payments/1056']['controller'];
        $controllerActionMethod = $routes['GET']['payments/1056']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['payments']['controller'];
        $controllerActionMethod = $routes['POST']['payments']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['payments']['controller'];
        $controllerActionMethod = $routes['PUT']['payments']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['payments']['controller'];
        $controllerActionMethod = $routes['PATCH']['payments']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['payments/']['controller'];
        $controllerActionMethod = $routes['DELETE']['payments/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

//ProductRequest
if($isProductRequest) {
    $productControllerObj = ObjectContainer::ProductController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['products']['controller'];
            $controllerActionMethod = $routes['GET']['products']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['products/112']['controller'];
        $controllerActionMethod = $routes['GET']['products/112']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['products']['controller'];
        $controllerActionMethod = $routes['POST']['products']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['products']['controller'];
        $controllerActionMethod = $routes['PUT']['products']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['products']['controller'];
        $controllerActionMethod = $routes['PATCH']['products']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }


    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['products/']['controller'];
        $controllerActionMethod = $routes['DELETE']['products/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}

//ProductLineRequest
if($isProductLinesRequest) {
    $productLinesControllerObj = ObjectContainer::ProductLineController();
    if ($requestObj->getRequestType() === 'GET') {
        $urlPathData = explode( '/', $requestObj->getRequestPath());
        if (!isset($urlPathData[2]))
        {
            $controllerObj = $routes['GET']['productlines']['controller'];
            $controllerActionMethod = $routes['GET']['productlines']['action'];
            echo call_user_func([$controllerObj, $controllerActionMethod]);
            die;
        }
        $controllerObj = $routes['GET']['productlines/1056']['controller'];
        $controllerActionMethod = $routes['GET']['productlines/1056']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'POST') {
        $controllerObj = $routes['POST']['productlines']['controller'];
        $controllerActionMethod = $routes['POST']['productlines']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PUT') {
        $controllerObj = $routes['PUT']['productlines']['controller'];
        $controllerActionMethod = $routes['PUT']['productlines']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'PATCH') {
        $controllerObj = $routes['PATCH']['productlines']['controller'];
        $controllerActionMethod = $routes['PATCH']['productlines']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }

    if ($requestObj->getRequestType() === 'DELETE') {
        $controllerObj = $routes['DELETE']['productlines/']['controller'];
        $controllerActionMethod = $routes['DELETE']['productlines/511']['action'];
        echo call_user_func([$controllerObj, $controllerActionMethod]);
        die;
    }
}
