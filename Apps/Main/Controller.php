<?php

namespace Apps\Main;

use Agee\Utilities\View;

class Controller extends \Agee\Parents\Controller
{
    protected $user;
    protected $SEO;


    protected function boot()
    {
        View::setPath('Views');
        View::setMainTemplate('main');

        View::set('whoIsSimplest', 'Agee Lite');
    }


}