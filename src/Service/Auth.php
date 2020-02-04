<?php
namespace App\Service;
/**
 * Class Auth
 * @package App\Service
 */
class Auth
{
    const SESSION_INDEX = 'token';

    /**
     * Connect the user, set in the session
     * @param $user
     */
    public static function connect($user)
    {
        $_SESSION[self::SESSION_INDEX] = serialize($user);
    }

    /**
     * Get the user in the session
     * @return bool|mixed
     */
    public static function getUser()
    {
        return self::isConnected() ? unserialize($_SESSION[self::SESSION_INDEX]) : false;
    }

    /**
     * Verify if the user is in the session
     * @return bool
     */
    public static function isConnected()
    {
       return isset($_SESSION[self::SESSION_INDEX]);
    }

    /**
     * Unset the user session
     */
    public static function disconnect()
    {
        unset($_SESSION[self::SESSION_INDEX]);
    }
}