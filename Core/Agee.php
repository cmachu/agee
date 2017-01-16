<?php

namespace Core;

use Illuminate\Contracts\Container\BindingResolutionException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

class Agee
{

    private static $dispatcher;
    private static $appName;
    private static $utility = [];

    public static function init()
    {
        self::debug();

        try {
            self::$dispatcher = new Dispatcher();
            $response = self::$dispatcher->dispatch($_SERVER['REQUEST_METHOD'],
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        } catch (BindingResolutionException $e) {
            throw new \Exception("Could not connect to database!");
        } catch (HttpRouteNotFoundException $e) {
            throw new \Exception("Route not found!");
        } catch (\Exception $e) {
            throw new \Exception("Exception: " . $e->getMessage());
        }

        if (View::getMainTemplate() !== false) {
            echo View::template(View::getMainTemplate(), array('content' => $response));
        } else {
            echo $response;
        }

    }

    public static function debug()
    {
        global $ageeConfig;
        global $whoops;

        if ($ageeConfig['mode'] == 'deep_debug') {
            $whoops = new \Whoops\Run();
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
            $whoops->register();
        } elseif ($ageeConfig['mode'] == 'release') {
            ini_set('display_error', false);
            error_reporting(0);
        }
    }

    public static function setUtility($router, $session, $database)
    {
        self::$utility['router'] = $router;
        self::$utility['session'] = $session;
        self::$utility['database'] = $database;
    }

    public function __set($name, $value)
    {
        self::$utility[$name] = $value;
    }

    public static function __get($name)
    {
        if (array_key_exists($name, self::$utility)) {
            return self::$utility[$name];
        }
        return false;
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