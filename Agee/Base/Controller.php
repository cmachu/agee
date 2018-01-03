<?php
namespace Agee\Base;

use Agee\Agee;
use Agee\Services\Ajax;
use Agee\Services\Input;
use Agee\Services\View;


class Controller
{
    protected $router;
    protected $session;

    public function __construct()
    {
        Input::boot();
        $this->boot();

        $this->router = Agee::get('router');
        $this->session = Agee::get('session');

        View::set('database', Agee::get('database'));
        View::set('session', $this->session);
        View::set('router', $this->router);
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