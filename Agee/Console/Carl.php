<?php

namespace Agee\Console;

use Agee\Console\Services\Help\Module;

class Carl
{

    private $response;

    public function __construct($argv, $argc)
    {
        if ($argc > 1) {
            $moduleName = ucfirst($argv[1]);
            $className = "\\Agee\\Console\\Services\\".$moduleName."\\Module";
            $class = new $className();
            $this->setResponse($class->getHelp());
        } else {
            $class = new Module();
            $this->setResponse($class->getHelp());
        }

    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

}