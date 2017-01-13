<?php

$this->controller_name = 'Apps\Main\Controller';

$this->router->any(['/', 'home'], ['Apps\Main\Controllers\Home', 'anyIndex']);
$this->router->any(['/category/{id:i}', 'category_'], ['Apps\Main\Controllers\Home', 'anyCategory']);

