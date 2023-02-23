<?php
declare(strict_types = 1);
require_once 'controllers/CustomerController.php';
require_once 'models/CustomerModel.php';
require_once 'controllers/EmployeeController.php';
require_once 'models/EmployeeModel.php';
require_once 'controllers/OfficeController.php';
require_once 'models/OfficeModel.php';
require_once 'controllers/OrderController.php';
require_once 'models/OrderModel.php';
require_once 'controllers/OrderDetailController.php';
require_once 'models/OrderDetailModel.php';
require_once 'controllers/PaymentController.php';
require_once 'models/PaymentModel.php';
require_once 'controllers/ProductController.php';
require_once 'models/ProductModel.php';
require_once 'controllers/ProductLineController.php';
require_once 'models/ProductLineModel.php';
require_once 'MySQLDatabase.php';
require_once 'Response.php';
require_once 'Request.php';

class ObjectContainer
{
    public static function response(): Response
    {
        return new Response();
    }

    public static function request(): Request
    {
        return new Request();
    }

    public static function mysqlDB(): MySQLDatabase
    {
        return new MySQLDatabase();
    }

    public static function customerModel(): CustomerModel
    {
        return new CustomerModel();
    }
    public static function customerController(): CustomerController
    {
        return new CustomerController();
    }

    public static function employeeModel(): EmployeeModel
    {
        return new EmployeeModel();
    }
    public static function employeeController(): EmployeeController
    {
        return new EmployeeController();
    }

    public static function officeModel(): OfficeModel
    {
        return new OfficeModel();
    }
    public static function officeController(): OfficeController
    {
        return new OfficeController();
    }

    public static function orderModel(): OrderModel
    {
        return new OrderModel();
    }
    public static function orderController(): OrderController
    {
        return new OrderController();
    }

    public static function orderDetailModel(): OrderDetailModel
    {
        return new OrderDetailModel();
    }
    public static function orderDetailController(): OrderDetailController
    {
        return new OrderDetailController();
    }

    public static function paymentModel(): PaymentModel
    {
        return new PaymentModel();
    }
    public static function paymentController(): PaymentController
    {
        return new PaymentController();
    }
    public static function productModel(): ProductModel
    {
        return new ProductModel();
    }
    public static function productController(): ProductController
    {
        return new ProductController();
    }
    public static function productLineModel(): ProductLineModel
    {
        return new ProductLineModel();
    }
    public static function productLineController(): ProductLineController
    {
        return new ProductLineController();
    }
}