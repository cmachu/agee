<?php

namespace Core;

use Phroute\Phroute\Exception\HttpRouteNotFoundException;

class Agee {

    private static $dispatcher;
    private static $appName;
    private static $appStart;

    public static function init(){
        global $ageeConfig;
        self::debug();

        self::$dispatcher = new Dispatcher();
        $response = self::$dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    //    print_r($response);
  //      die('asd');

//            if(View::getMainTemplate() !== false)
//                echo View::template(View::getMainTemplate(), array('content'=>$response));




    }

    public static function debug()
    {
        global $ageeConfig;
        global $whoops;

        if($ageeConfig['mode'] == 'deep_debug'){
            $whoops = new \Whoops\Run();
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
            $whoops->register();
            self::$appStart = microtime();
        } elseif($ageeConfig['mode'] == 'release') {
            ini_set('display_error', false);
            error_reporting(0);
        }
    }

    public static function setAppName($value)
    {
        self::$appName = $value;
    }

    public static function getAppName()
    {
        return self::$appName;
    }

}