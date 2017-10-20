<?php
namespace Agee\Base\Services;

class Router extends \Phroute\Phroute\RouteCollector
{
    protected $url;

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
        return $link;
    }

}

?>