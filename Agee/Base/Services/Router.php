<?php
namespace Agee\Base\Services;

use Agee\Pieces\Helpers;

class Router extends \Phroute\Phroute\RouteCollector
{
    use Helpers;

    protected $url;

    public function url($path, $vars = array(), $domain = false)
    {
        $link = '/' . stripslashes($this->route($path, $vars));
        return $link;
    }

}

?>