<?php
error_reporting( E_ALL );

$ageeCache = array();
require 'vendor/autoload.php';
require 'config/config.php';
require 'config/database.php';

session_start();
date_default_timezone_set($ageeConfig['timezone']);

Core\Agee::init();