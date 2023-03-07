<?php

namespace App\migrations;

class SPMigration2 extends BaseMigration
{
    public function run()
    {
        echo "Created stored procedure to retrieve all customers based on city". PHP_EOL;
        $sql = <<< SP
            CREATE PROCEDURE IF NOT EXISTS GetCustomersByCity(IN cityName VARCHAR(255))
            BEGIN
                DECLARE city_name VARCHAR(255) DEFAULT 'NYC';
                  IF cityName IS NOT NULL THEN
                     set city_name = cityName;
                  END IF;
                SELECT * 
                FROM customers
                WHERE city = city_name;
            END
SP;
        $this->exec($sql);
    }
}