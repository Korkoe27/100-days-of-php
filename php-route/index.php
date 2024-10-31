<?php


ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('error_reporting', E_ALL);

require('functions.php');


$uri = $_SERVER['REQUEST_URI'];

// dd($uri);

if($uri === '/100-days-of-php/php-route/'){
    require "controllers/index.php";
} elseif($uri === '/100-days-of-php/php-route/controllers/about.php'){
    require "controllers/about.php";
} elseif($uri == '/100-days-of-php/php-route/contact/'){
    require "views/contact.view.php";
}