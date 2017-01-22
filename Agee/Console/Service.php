<?php

namespace Agee\Console;

class Service
{

    protected $availableCalls = ['help'];

    public function dispatch($call){
        if(!in_array($call,$this->availableCalls)) return $this->getHelp();

        $callMethod = "get".ucfirst($call);
        return $this->$callMethod();
    }

    public function getHelp()
    {
        $text = "---- HELP FOR: DEFAULT SERVICE ----\n";
        $text .= "Default service help\n";
        return $text;
    }

}