<?php

namespace Core;

use Tools\Ajax;

class Controller{

    protected $router;
    protected $session;
    protected $database;
    protected $meta;

    public function __construct(){
        global $ageeConfig;
        \Tools\Input::boot();

//        $this->router = $dispatcher->getRouter();
 //       $this->session = $dispatcher->getSession();
  //      $this->database = $dispatcher->getDatabase();

        $this->boot();
    }


    protected function boot(){

    }


    public function setAjax(){
        Ajax::setAjaxMode();
        View::setMainTemplate(false);
    }


}