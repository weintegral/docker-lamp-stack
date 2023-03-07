<?php

namespace App\migrations;

class Migration1 extends BaseMigration
{
    public function run()
    {
        echo "Created Database called school". PHP_EOL;
        $this->exec('CREATE DATABASE IF NOT EXISTS `school`');
    }
}

