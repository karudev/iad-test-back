<?php
namespace App\Service;

class Auth
{
    const SESSION_INDEX = 'token';

    public static function connect($user)
    {
        $_SESSION[self::SESSION_INDEX] = serialize($user);
    }

    public static function getUser()
    {
        return self::isConnected() ? unserialize($_SESSION[self::SESSION_INDEX]) : false;
    }

    public static function isConnected()
    {
       return isset($_SESSION[self::SESSION_INDEX]);
    }

    public static function disconnect()
    {
        unset($_SESSION[self::SESSION_INDEX]);
    }
}