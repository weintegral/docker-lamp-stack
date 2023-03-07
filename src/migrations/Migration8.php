<?php
declare(strict_types=1);
namespace App\migrations;

class Migration8 extends BaseMigration
{
    public function run()
    {
        echo "Updated table address column postal_code to not accept null values" . PHP_EOL;
        $sql = <<< SQL
            ALTER TABLE address
            MODIFY postal_code INT(10) NOT NULL;
SQL;

        $this->exec($sql);
    }
}