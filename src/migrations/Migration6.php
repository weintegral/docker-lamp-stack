<?php
declare(strict_types=1);
namespace App\migrations;

class Migration6 extends BaseMigration
{
    public function run()
    {
        echo "Created table address" . PHP_EOL;
        $sql = <<< SQL
            CREATE TABLE IF NOT EXISTS address (
                id INT NOT NULL AUTO_INCREMENT,
                address1 VARCHAR(255) NOT NULL,
                address2 VARCHAR(255),
                city_id INT,
                postal_code INT(10),
                FOREIGN KEY (city_id) REFERENCES city(id),
                PRIMARY KEY (id)
            );
SQL;

        $this->exec($sql);
    }
}