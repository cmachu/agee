<?php

namespace Core;

class Dispatcher extends \Phroute\Phroute\Dispatcher
{

    protected $controller_name;
    protected $capsule;
    protected $database;
    protected $session;
    protected $router;

    public function __construct()
    {

        global $ageeConfig;
        global $ageeConnection;

        if ($ageeConfig['useDatabase']) {
            $this->capsule = new Database($ageeConnection[$ageeConfig['defaultConnection']]);
            $this->database = $this->capsule->connection('default');
        }

        if ($ageeConfig['useSession']) {
            $this->session = new Session();
        }

        $this->router = new Router;

        Agee::setAppName($this->getAppName());
        include('./Apps/' . Agee::getAppName() . '/routing.php');

        Agee::setUtility($this->router, $this->session, $this->database);

        parent::__construct($this->router->getData());
    }

    public function getAppName()
    {
        global $ageeConfig;
        return $ageeConfig['defaultApp'];
    }

}