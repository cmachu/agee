<?php

namespace Core;

use Tools\Ajax;

class Controller
{

    protected $agee;
    protected $services;

    public function __construct()
    {
        \Tools\Input::boot();
        $this->boot();

        $this->services = Agee::getServices();
        View::set('Services',$this->services);
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