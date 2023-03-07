<?php
declare(strict_types=1);
namespace App\migrations;

class Migration5 extends BaseMigration
{
    public function run()
    {
        echo "Updated table city column state_id to not accept null values" . PHP_EOL;
        $sql = <<< SQL
            ALTER TABLE city
            MODIFY state_id INT NOT NULL;
SQL;

        $this->exec($sql);
    }
}