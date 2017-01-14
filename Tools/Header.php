<?php

namespace Tools;

class Header
{

    public static function location($url, $time = false)
    {
        if ($time !== false) {
            header("Refresh:{$time};url={$url}");

            return true;
        } else {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $url);

            return true;
        }
    }

    public static function refresh()
    {
        header("Refresh:0");

        return true;
    }

    public static function back($time = false)
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return self::location($_SERVER['HTTP_REFERER'], $time);
        } else {
            return self::location('/', $time);
        }
    }

}
