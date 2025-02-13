<?php

$GLA->articleSee();

$articleID = $GLA->articleID();

if($GLA->articlePriceMin() == '0'){

    require "theme/inc/_more.php";

}else{

    require "theme/inc/_single.php";

}