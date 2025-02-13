<?php session_start();

define('LOGIN', 'ebricodom');
define('TOKEN', md5('gla-ebricodom'));
define('JWT_TOKEN', md5('gla-ebricodom-global'));

require 'API.php';

$post = json_decode(file_get_contents('php://input'), TRUE);

API::auth($post);

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

require '../gla-adminer/class/Config.php';

require '../gla-adminer/class/BDD/App.php';
require '../gla-adminer/class/BDD/Bdd.php';

$db = BDD\App::getBDD();

define('WEBROOT', Config::get('url'));