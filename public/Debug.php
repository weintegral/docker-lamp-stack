<?php

Class Debug
{

//=======
    public static function dd($var, $message = ''): void
    {
        var_dump($var);
        die($message);
    }
//>>>>>>> a748f8a82a895f879d1aa5f18f9591087dd612b9
}