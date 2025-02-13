<?php

if(isset($_FILES['img'])){

    include "../../class/Config.php";

    $img = "";
    if(!empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name'])){

        $type = 'jpg';//pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $img = rand(1, 900000000)."_".date('d-m-Y',time())."_".rand(1, 900000).".$type";
        $size = getimagesize($_FILES['img']['tmp_name']);

        require "../../lib/vendor/autoload.php";
        $manager = new \Intervention\Image\ImageManager();

        if($size[0] > 800){
            $manager->make($_FILES['img']['tmp_name'])->orientate()->resize(Config::get('img_full'),null,function($c){$c->aspectRatio();})->interlace(true)->save('../../uploads/article/full/'.$img);
            $manager->make($_FILES['img']['tmp_name'])->orientate()->resize(Config::get('img_thumb'),null,function($c){$c->aspectRatio();})->interlace(true)->save('../../uploads/article/small/'.$img);
        }else{
            $manager->make($_FILES['img']['tmp_name'])->orientate()->save('../../uploads/article/full/'.$img);
            $manager->make($_FILES['img']['tmp_name'])->orientate()->resize(Config::get('img_thumb'),null,function($c){$c->aspectRatio();})->interlace(true)->save('../../uploads/article/small/'.$img);
        }
        
    }

    echo $img;

}else{
    echo "error";
}