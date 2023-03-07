<?php
declare(strict_types=1);
namespace App\migrations;

class Migration2 extends BaseMigration
{
    public function run()
    {
        echo "Created Table called state" . PHP_EOL;
        # heredoc syntax === ""
        # nowdoc === ''
        $sql = <<< SQL
            CREATE TABLE IF NOT EXISTS state (
                id int not null auto_increment,
                name varchar(255) not null,
                PRIMARY KEY (id)
            );
SQL;

        $this->exec($sql);
    }
}