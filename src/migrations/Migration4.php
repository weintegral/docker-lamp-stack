<?php

namespace App\migrations;

class Migration4 extends BaseMigration
{
    public function run()
    {
        echo "Created Table called city" . PHP_EOL;
        $sql = <<< SQL
            CREATE TABLE IF NOT EXISTS city (
                id INT NOT NULL AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL,
                state_id INT,
                FOREIGN KEY (state_id) REFERENCES state(id),
                PRIMARY KEY (id)
            );
SQL;

        $this->exec($sql);
    }
}