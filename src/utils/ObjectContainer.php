<?php
declare(strict_types=1);

namespace App\utils;

use App\controllers\CustomerController;
use App\models\CustomerModel;

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
}