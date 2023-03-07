<?php

namespace App\migrations;

class MainSPMigration
{
    public function run()
    {
        (new SPMigration1())->run();
        (new SPMigration2())->run();
    }
}