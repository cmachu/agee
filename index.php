<?php
error_reporting( E_ALL );

require 'vendor/autoload.php';
require 'Config/config.php';
require 'Config/database.php';

session_start();
date_default_timezone_set($ageeConfig['timezone']);

Agee\Agee::init();