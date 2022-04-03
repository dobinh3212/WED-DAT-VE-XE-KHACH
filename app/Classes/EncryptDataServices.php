<?php
namespace App\Classes;

use \Crypt;

class EncryptDataServices
{
    public static function encode($input)
    {
        $payload = Crypt::encrypt($input);
        return $payload;
    }
    public static function decode($input)
    {
        $payload = Crypt::decrypt($input);
        return $payload;
    }
}
