<?php
declare(strict_types = 1);

use App\migrations\MainMigration;

try {
    (new MainMigration())->run();
} catch(Throwable $exception) {
    logger($exception->getMessage());
}