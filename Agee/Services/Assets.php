<?php

namespace Agee\Services;

use Agee\Agee;
use Agee\Base\Services\Router;

class Assets
{
    public static function script($filename = '')
    {
        echo "<script type='text/javascript' src='".Agee::getAppName()."'></script>";
    }

    public static function style($filename = '')
    {
        echo "";
    }

}