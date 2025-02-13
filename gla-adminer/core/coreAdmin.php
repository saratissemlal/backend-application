<?php session_start();

require dirname(__DIR__) . '/core/Autoload.php';
Autoload::register('load');

define('WEBROOT',Config::get('url'));

$db = BDD\App::getBDD();

if(isset($_COOKIE['GLA118']) && !Func::isSession()) \Recuperation\Login::rememberLogin($db,$_COOKIE['GLA118']);

