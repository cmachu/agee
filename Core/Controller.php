<?php

namespace Core;

use Tools\Ajax;

class Controller
{

    public function __construct()
    {
        \Tools\Input::boot();
        $this->boot();
        View::set('session', Agee::__get('session'));
        View::set('database', Agee::__get('database'));
        View::set('router', Agee::__get('router'));
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