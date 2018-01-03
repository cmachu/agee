<?php
namespace Agee\Base\Services;

use Agee\Pieces\Helpers;

class Router extends \Phroute\Phroute\RouteCollector
{
    use Helpers;

    protected $url;

    public function url($path, $vars = array(), $domain = false)
    {
        if($domain) {
            return self::getDomain() . '/' . stripslashes($this->route($path, $vars));
        } else {
            return '/' . stripslashes($this->route($path, $vars));
        }
    }

}

?>