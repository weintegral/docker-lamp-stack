<?php

namespace App\migrations;

class Migration7 extends BaseMigration
{
    public function run()
    {
        echo "Updated table address column city_id to not accept null values" . PHP_EOL;
        $sql = <<< SQL
            ALTER TABLE address
            MODIFY city_id INT NOT NULL;
SQL;

        $this->exec($sql);
    }
}