<?php

namespace App\migrations;

class SPMigration1 extends BaseMigration
{
    public function run()
    {
        echo "Created stored procedure to retrieve all customers". PHP_EOL;
        $sql = <<< SP
            CREATE PROCEDURE IF NOT EXISTS GetAllCustomers()
            BEGIN
                SELECT *  FROM customers;
            END
SP;
        $this->exec($sql);
    }
}