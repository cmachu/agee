<?php

namespace Core;


class Router extends \Phroute\Phroute\RouteCollector
{
    protected $url;
    protected $language;

    function getFullPath()
    {
        return "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    public function getPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    function url($path, $vars = array(), $domain = false)
    {
        $link = '/' . stripslashes($this->route($path, $vars));

        if ($domain === true)
            $link = $this->getDomain() . $link;

        return $link;
    }

}

?>