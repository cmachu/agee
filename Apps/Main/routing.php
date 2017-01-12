<?php

$this->controller_name = 'Apps\Main\Controller';

$router->any(['/', 'home'], ['Apps\Main\Controllers\Home', 'anyIndex']);
$router->any(['/category/{id:i}', 'category_'], ['Apps\Main\Controllers\Home', 'anyCategory']);

