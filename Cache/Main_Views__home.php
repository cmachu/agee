<?php

use Agee\Services\Assets as Assets;
use Agee\Services\Input as Input;

?><body>

    <h1><?php echo $whoIsSimplest ?></h1>
    <!-- $whoIsSimplest is defined in /Apps/Main/Controller.php -->
    <h3>Simplest MVC framework on whole Earth!</h3>


    <?php foreach($categories as $category): ?>
        <a href="<?php echo $router->url('category_',[$category['id']]) ?>"><?php echo $category['name'] ?></a><BR>
    <?php endforeach ?>

        <input type="text" <?php echo Input::value('test')  ?>>
    <?php Assets::script('test.js'); ?>
</body>