<?php

namespace App\Helpers;

class Helper
{
    public static function print_pre($arr): void{
         echo "<pre>";
         print_r($arr);
         echo "</pre>";
    }
}