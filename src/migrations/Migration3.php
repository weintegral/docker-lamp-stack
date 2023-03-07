<?php
declare(strict_types=1);
namespace App\migrations;

class Migration3 extends BaseMigration
{
    public function run()
    {
        echo "Created Table called subject" . PHP_EOL;
        # heredoc syntax === ""
        # nowdoc === ''
        $sql = <<< SQL
            CREATE TABLE IF NOT EXISTS subject (
                id INT NOT NULL auto_increment,
                name VARCHAR(255) NOT NULL,
                tutor VARCHAR(255) NOT NULL,
                lab BOOLEAN NOT NULL DEFAULT false,
                code INT(10) NOT NULL,
                PRIMARY KEY (id)
            );
SQL;

        $this->exec($sql);
    }
}