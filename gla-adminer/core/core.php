<?php session_start();

require dirname(__DIR__) . '/core/Autoload.php';
Autoload::register('load');

define('WEBROOT',Config::get('url'));
define('ASSETS',Config::get('assets'));

$db = BDD\App::getBDD();

if(isset($_COOKIE['GLA118']) && !Func::isSession()) \Recuperation\Login::rememberLogin($db,$_COOKIE['GLA118']);

if(!isset($_SESSION['panier'])){

    if(isset($_COOKIE['kh_globalads_dz'])){

        $val = explode(".", $_COOKIE['kh_globalads_dz']);

        if(isset($val[0]) && $val[0] !== 0){

            $tab = [];

            foreach($val AS $v){

                array_push($tab, $v);

            }

            array_shift($tab);

            $_SESSION['panier']['nbr'] = $val[0];
            $_SESSION['panier']['produits'] = $tab;

        }else{

            $_SESSION['panier']['nbr'] = 0;
            $_SESSION['panier']['produits'] = [];

        }

    }else{

        $_SESSION['panier']['nbr'] = 0;
        $_SESSION['panier']['produits'] = [];

    }

}