<?php

namespace Agee\Console\Services\Help;

use Agee\Console\Service;

class Module extends Service
{
    protected $availableCalls = ['help', 'test'];

    public function getTest(){
        return "\n\n--- This is test method --- \n\n";
    }

    public function getHelp(){
        $text = "---- Carl - Agee manager ----\n";
        $text.= "Available commands:\n\n";
        $text.= "migrate - run migration from /Apps/Migrate";
        $text.= "\n\n";
        return $text;
    }

}