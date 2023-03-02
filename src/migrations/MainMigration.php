<?php

namespace App\migrations;

class MainMigration
{
    public function run()
    {
        (new Migration1())->run();
        (new Migration2())->run();
    }
}