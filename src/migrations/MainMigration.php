<?php

namespace App\migrations;

class MainMigration
{
    public function run()
    {
        (new Migration1())->run();
        (new Migration2())->run();
        (new Migration3())->run();
        (new Migration4())->run();
        (new Migration5())->run();
        (new Migration6())->run();
        (new Migration7())->run();
        (new Migration8())->run();
        (new Migration9())->run();
        (new Migration10())->run();
    }
}