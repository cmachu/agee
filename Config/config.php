<?php

$ageeConfig = array(
    'mode' =>               'deep_debug',
    'timezone' =>           'Europe/Warsaw',
    'useDatabase' =>        true,
    'useSession' =>         true,
    'defaultConnection' =>  'main',
    'defaultApp' =>         'Main',
    'forceBuildTemplate' => true,
);

/*
    Mode:
    deep_debug - return errors with whoops
    debug      - return classic errors
    release    - return no errors

*/