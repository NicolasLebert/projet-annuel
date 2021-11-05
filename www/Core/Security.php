<?php

namespace App\Core;

class Security
{
    public static function generateToken(){
        return substr(md5(uniqid(true)), 0, 16);
    }
}