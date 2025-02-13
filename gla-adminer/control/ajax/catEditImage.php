<?php require "../../core/coreAjax.php";

if(!empty($_FILES) && isset($_POST['id']) && isset($_POST['imagename'])){

    $db = BDD\App::getBDD();

    if(!empty($_POST['imagename'])){

        $img = $_POST['imagename'];

    }else{

        $type = 'jpg';//pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $img = rand(1, 900000000)."_".date('d-m-Y',time())."_".rand(1, 900000).".$type";

        $db->query("UPDATE categories SET image = ? WHERE idC = ?",[$img,$_POST['id']]);

    }

    if(!empty($_FILES['image']['name']) && !empty($_FILES['image']['tmp_name'])){

        require "../../lib/vendor/autoload.php";
        $manager = new \Intervention\Image\ImageManager();

        $manager->make($_FILES['image']['tmp_name'])->orientate()->resize(Config::get('img_thumb'),null,function($c){$c->aspectRatio();})->interlace(true)->save("../../uploads/article/small/$img");

    }

    echo "GLAoK";

}else{

    echo "error";

}