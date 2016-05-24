<?php
namespace Core\Lib;

class Token
{
    public static function createToken()
    {
        return hash('sha256', microtime() + rand(0,999) + rand(100, 99999));
    }
}