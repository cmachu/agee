<?php
namespace Agee\Base;

use Agee\Agee;
use Agee\Utilities\Ajax;
use Agee\Utilities\Input;
use Agee\Utilities\View;

class Controller
{

    public function __construct()
    {
        Input::boot();
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