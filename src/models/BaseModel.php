<?php

namespace App\models;

use App\utils\MySQLDatabase;
use App\utils\ObjectContainer;

class BaseModel
{
    protected MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    protected function executeGetStoredProcedure(string $name): array
    {
        return $this
            ->database
            ->getConnection()
            ->query($name)
            ->fetchAll();
    }
}