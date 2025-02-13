<?php session_start();

if(!isset($_POST)) exit();

require dirname(__DIR__) . '/core/Autoload.php';
Autoload::register('ajax');

$db = BDD\App::getBDD();