<?php

namespace Core\Services;

use Illuminate\Database\Capsule\Manager;

class Database extends Manager
{

    function __construct($options = [])
    {
        parent::__construct();

        $this->addConnection($options);
        $this->setAsGlobal();
        $this->bootEloquent();
    }

}