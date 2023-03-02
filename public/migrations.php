<?php
declare(strict_types = 1);

ini_set('error_log', '/var/www/html/errors.log');

function dd($var, $message = ''): void
{
    var_dump($var);
    die($message);
}

function logger(string $message)
{
    error_log($message, 3, '/var/www/html/errors.log');
}