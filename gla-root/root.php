<?php

$GLA = new Root\GLAsite($db);
$asset = new \Root\Assets($GLA->langue, $db);

define('L', $GLA->langue);

$page = Root\GLA::exp($_GET['u']);

$p = $page[0];

$get_u = trim($_GET['u'], 'ar/');

include 'theme/head.php';

if(empty($get_u)){

    include 'theme/index.php';

}else{

    if(isset($p) && in_array($p ,['page','categorie','search','tag'])){

        switch($p){

            case 'page':
                if(!\Root\GLA::pageExist($page[1],$db)){
                    include 'theme/page.php';
                }else{
                    include "theme/page/".$page[1].".php";
                }
            break;

            case 'categorie':
                if(!\Root\GLA::catExist(max($page),$db)){
                    include 'theme/categorie.php';
                }else{
                    include "theme/categorie/".$page[1].".php";
                }
            break;

            case 'search': include 'theme/search.php';break;
            case 'tag': include 'theme/tag.php';break;

        }

    }else{

        if($p == '404'){
            include 'theme/404.php';
        }else{
            include 'theme/single.php';
        }

    }

}

include 'theme/foot.php';