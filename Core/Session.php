<?php

namespace Core;


class Session
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            $this->init_session();
        }
    }

    public function init_session()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
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

}