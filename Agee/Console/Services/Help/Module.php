<?php

namespace Agee\Console\Services\Help;

use Agee\Console\Service;

class Module extends Service
{

    public function getHelp(){
        $text = "---- Carl - Agee manager ----\n";
        $text.= "Available commands:\n\n";
        $text.= "migrate - run migration from /Apps/Migrate";
        $text.= "\n\n";
        return $text;
    }

}