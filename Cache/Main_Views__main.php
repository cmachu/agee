<?php

use Agee\Services\Assets as Assets;
use Agee\Services\Input as Input;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" id="viewport-hook">

    <title>Agee Lite - Simplest MVC framework on whole Earth!</title>

    <?php  Assets::style('style.css');  ?>

    <?php  Assets::script('app.js');  ?>

</head>

<?php echo $content ?>

</html>
