<?php
namespace Agee;

use Agee\Base\Services\Database;
use Agee\Base\Services\Router;
use Agee\Base\Services\Session;

class Dispatcher extends \Phroute\Phroute\Dispatcher
{
    protected $controller_name;
    protected $services = [];

    public function __construct()
    {
        global $ageeConfig;
        global $ageeConnection;

        if ($ageeConfig['useDatabase']) {
            $this->services['capsule'] = new Database($ageeConnection[$ageeConfig['defaultConnection']]);
            $this->services['database'] = $this->services['capsule']->connection('default');
        } else {
            $this->services['database'] = false;
            $this->services['capsule'] = false;
        }

        if ($ageeConfig['useSession']) {
            $this->services['session'] = new Session();
        } else {
            $this->services['session'] = false;
        }

        $this->services['router'] = new Router();

        Agee::setAppName($this->getAppName());
        $router = $this->services['router'];
        include('./Apps/' . Agee::getAppName() . '/Routing.php');
        $this->services['router'] = $router;

        Agee::setServices($this->services);

        parent::__construct($this->services['router']->getData());
    }

    public function getAppName()
    {
        global $ageeConfig;
        return $ageeConfig['defaultApp'];
    }

}