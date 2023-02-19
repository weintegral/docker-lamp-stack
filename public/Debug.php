<?php

trait Debug
{
    public function printing($result, $message=''): void
    {

        var_dump($result);
        die;
    }

}