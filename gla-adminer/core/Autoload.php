<?php
class Autoload{

    static function register($l){
        spl_autoload_register([__CLASS__, $l]);
    }

    static function load($c){
        $c = str_replace('\\','/',$c);
        require dirname(__DIR__) . '/class/'.$c.'.php';
    }

    static function ajax($c){

        if(preg_match("/Intervention/", $c)) return false;
        //$c = str_replace('NV\\','',$c);
        $c = str_replace('\\','/',$c);
        require dirname(__DIR__) . '/class/'.$c.'.php';
    }

    static function verif($c){
        $c = str_replace('\\','/',$c);
        require '../class/'.$c.'.php';
    }

    static function mobile($c){
        $c = str_replace('\\','/',$c);
        require $_SERVER["DOCUMENT_ROOT"].'/Niveau+/n+/class/'.$c.'.php';
    }

}