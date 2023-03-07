<?php
declare(strict_types = 1);

use App\migrations\MainMigration;
use App\migrations\MainSPMigration;

try {
    (new MainMigration())->run();
    (new MainSPMigration())->run();
} catch(Throwable $exception) {
    logger($exception->getMessage());
}
