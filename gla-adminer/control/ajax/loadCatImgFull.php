<?php

if(isset($_FILES['img'])){

    include "../../class/Config.php";

    $img = "";
    if(!empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name'])){

        $type = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $img = rand(1, 900000000)."_".date('d-m-Y',time())."_".rand(1, 900000).".$type";
        $size = getimagesize($_FILES['img']['tmp_name']);

        require "../../lib/vendor/autoload.php";
        $manager = new \Intervention\Image\ImageManager();

        $manager->make($_FILES['img']['tmp_name'])->orientate()->interlace(true)->save('../../uploads/article/small/'.$img);

    }

    echo $img;

}else{
    echo "error";
}