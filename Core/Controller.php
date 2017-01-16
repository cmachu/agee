<?php

namespace Core;

use Tools\Ajax;

class Controller
{

    protected $agee;
    protected $session;
    protected $database;
    protected $router;

    public function __construct()
    {
        \Tools\Input::boot();
        $this->boot();

        $this->session = Agee::__get('session');
        $this->databse = Agee::__get('database');
        $this->router = Agee::__get('router');
    }

    protected function boot()
    {
        return false;
    }

    public function setAjax()
    {
        Ajax::setAjaxMode();
        View::setMainTemplate(false);
    }


}