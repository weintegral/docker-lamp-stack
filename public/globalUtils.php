<?php
declare(strict_types = 1);

function dd($var, $message = ''): void
{
    var_dump($var);
    die($message);
}