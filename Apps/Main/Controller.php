<?php

namespace Apps\Main;

class Controller extends \Core\Controller
{
    protected $user;
    protected $SEO;


    protected function boot()
    {
        \Core\View::setPath('Views');
        \Core\View::setMainTemplate('main');

        \Core\View::set('whoIsSimplest', 'Agee Lite');
    }


}