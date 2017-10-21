<?php

namespace Agee\Services;

use Agee\Agee;
use Agee\Pieces\Helpers;

class Assets
{
    use Helpers;

    public static function script($filename = 'app.js')
    {
        $filename = 'js/' . $filename . self::getFresh();
        echo "<script type='text/javascript' src='" . self::getAssetsPath($filename) . "'></script>";
    }

    public static function style($filename = 'style.css')
    {
        $filename = 'css/' . $filename . self::getFresh();
        echo "<link rel='stylesheet' href='" . self::getAssetsPath($filename) . "' media='screen'>";
    }

    private static function getAssetsPath($filename)
    {
        return self::getDomain() . '/public/' . strtolower(Agee::getAppName()) . '/' . $filename;
    }

    private static function getFresh()
    {
        global $ageeConfig;

        if ($ageeConfig['mode'] == 'deep_debug' || $ageeConfig == 'debug') {
            return "?debug=" . time().'-'.rand(0,10000);
        }

        return "?v=" . $ageeConfig['version'];
    }

}