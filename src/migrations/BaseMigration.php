<?php

namespace App\migrations;

use App\utils\MySQLDatabase;
use App\utils\ObjectContainer;

class BaseMigration
{
    protected MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    protected function exec(string $sql): int
    {
        return $this->database->getConnection()->exec($sql);
    }
}