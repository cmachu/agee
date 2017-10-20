<?php
namespace Agee\Base\Services;

class Session
{
    function __construct()
    {
        if (!isset($_SESSION)) {
            $this->initSession();
        }
    }

    public function initSession()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
    }

    public function isAuthorized()
    {
        if ($this->get('authorized') === false)
            return false;
        return true;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

}