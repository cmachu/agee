<?php

namespace Core;

use Tools\Ajax;

class Controller{

    public function __construct(){
        \Tools\Input::boot();
        $this->boot();
    }

    protected function boot(){
        return false;
    }

    public function setAjax(){
        Ajax::setAjaxMode();
        View::setMainTemplate(false);
    }


}