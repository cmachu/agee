<?php

$ageeConfig = array();

/*
    Mode:
    deep_debug - return errors with whoops
    debug      - return classic errors
    release    - return no errors

*/

$ageeConfig['mode']                 = 'deep_debug';
$ageeConfig['timezone']             = 'Europe/Warsaw';
$ageeConfig['useDatabase']          = true;
$ageeConfig['useSession']           = true;
$ageeConfig['defaultConnection']    = 'main';
$ageeConfig['defaultApp']           = 'Main';
$ageeConfig['forceBuildTemplate']   = true;

