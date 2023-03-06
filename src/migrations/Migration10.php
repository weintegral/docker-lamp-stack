<?php

namespace App\migrations;

class Migration10 extends BaseMigration
{
    public function run()
    {
        echo "Created table progress" . PHP_EOL;
        $sql = <<< SQL
            CREATE TABLE IF NOT EXISTS progress (
                id INT NOT NULL AUTO_INCREMENT,
                percentile INT(3) NOT NULL,
                student_id INT NOT NULL UNIQUE,
                FOREIGN KEY (student_id) REFERENCES student(id),
                PRIMARY KEY (id)
            );
SQL;
        $this->exec($sql);
    }
}