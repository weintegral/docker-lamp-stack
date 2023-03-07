<?php
declare(strict_types=1);
namespace App\migrations;

class Migration9 extends BaseMigration
{
    public function run()
    {
        echo "Created table student" . PHP_EOL;
        $sql = <<< SQL
            CREATE TABLE IF NOT EXISTS student (
                id INT NOT NULL AUTO_INCREMENT,
                first_name VARCHAR(255) NOT NULL,
                last_name VARCHAR(255) NOT NULL,
                address_id INT NOT NULL,
                semester INT(2) NOT NULL,
                subject_id INT NOT NULL,
                FOREIGN KEY (address_id) REFERENCES address(id),
                FOREIGN KEY (subject_id) REFERENCES subject(id),
                PRIMARY KEY (id)
            );
SQL;

        $this->exec($sql);
    }
}