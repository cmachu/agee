<?php

namespace Agee\Pieces;

trait Helpers
{
    public static function getURL()
    {
        return self::getProtocol() . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    public static function getDomain()
    {
        return self::getProtocol() . "://" . $_SERVER['HTTP_HOST'];
    }

    public static function getPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function getProtocol()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            return 'https';
        }

        return 'http';
    }
}