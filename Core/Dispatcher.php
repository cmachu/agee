<?php

namespace Core;

use Illuminate\Contracts\Container\BindingResolutionException;

class Dispatcher extends \Phroute\Phroute\Dispatcher{

    protected $controller_name;

    public function __construct() {

        global $ageeConfig;
        global $ageeConnection;

        if($ageeConfig['useDatabase']){
            try {
                $this->capsule = new Database($ageeConnection[$ageeConfig['defaultConnection']]);
                $this->database = $this->capsule->connection('default');
            } catch(BindingResolutionException $e){
                throw new \Exception("Could not connect to database!");
            }
		}

        if($ageeConfig['useSession']){
            $this->session = new Session();
        }

        $this->router = new Router;

        Agee::setAppName($this->getAppName());
        include('./Apps/'.Agee::getAppName().'/routing.php');

        View::set('router',$this->router);
        View::set('session',$this->session);

        parent::__construct($this->router->getData());
    }


    public function getRouter(){
        return $this->router;
    }

    public function getSession(){
        return $this->session;
    }

    public function getDatabase(){
        return $this->database;
    }

    public function getAppName(){
        global $ageeConfig;

    	return $ageeConfig['defaultApp'];
    }

}