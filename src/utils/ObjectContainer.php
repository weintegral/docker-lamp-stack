<?php
declare(strict_types = 1);


namespace App\utils;

use App\controllers\CustomerController;
use App\models\CustomerModel;

Class ObjectContainer
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
        return new OrderDetailModel ();
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