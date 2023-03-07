<?php

namespace App\migrations;

use App\utils\MySQLDatabase;


class BaseMigration
{
    protected MySQLDatabase $database;

    public function __construct()
    {
        $this->database = new MySQLDatabase(
            $database = 'school',
            $host = 'mysql-server',
            $username = 'root',
            $password = 'root'
        );
    }

    protected function exec(string $sql): int
    {
        return $this->database->getConnection()->exec($sql);
    }
}