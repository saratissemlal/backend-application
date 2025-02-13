<?php
namespace Recuperation\Home;


class Instance {

    static function init($url, $textes, $langue, $db){

        if(\Func::isSession()){

            $home = new Home($url,$db);

            $home->putText($textes, $langue);

            $home->run();

        }

    }

} 