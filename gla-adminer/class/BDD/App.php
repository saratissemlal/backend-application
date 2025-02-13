<?php
namespace BDD;

class App{

	static $db = null;

static function getBDD(){

	if(!self::$db){
		self::$db = new Bdd(\Config::get('login'),\Config::get('password'),\Config::get('db_name'));
	}
	return self::$db;
}

}