<?php
namespace Apps\Main;

use Agee\Services\View;

class Controller extends \Agee\Base\Controller
{
    protected function boot()
    {
        View::setPath('Views');
        View::setMainTemplate('main');

        View::set('whoIsSimplest', 'Agee Lite');
    }
}