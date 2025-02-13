<?php require "../../../gla-adminer/core/coreAjax.php";

if(!empty($_FILES) && Func::session()){

    $db = BDD\App::getBDD();

    if(!empty($_FILES['image']['name']) && !empty($_FILES['image']['tmp_name'])){

        $img = $db->query("SELECT avatar FROM utilisateurs WHERE idU = ?", [$_SESSION['id']])->fetch();

        if(empty($img->avatar)){

            $folder = rand(1,9999);

            if (!file_exists("../../assets/img/profile/$folder")) {
                mkdir("../../assets/img/profile/$folder", 0777, true);
            }

            $type = "jpg";

            $name = $folder."/".$_SESSION['id'].".$type";

        }else{

            $name = $img->avatar;

        }

        $size =  $_FILES['image']['size'];

        if($size < 2000000){

            list($width, $height) = getimagesize($_FILES['image']['tmp_name']);

            require "../../../gla-adminer/lib/vendor/autoload.php";
            $manager = new \Intervention\Image\ImageManager();

            $manager->make($_FILES['image']['tmp_name'])->orientate()->resize(150,null,function($c){$c->aspectRatio();})->interlace(true)->save("../../assets/img/profile/".$name);

            $db->query("UPDATE utilisateurs SET avatar = ? WHERE idU = ?", [$name, $_SESSION['id']]);

            $_SESSION['avatar'] = $name;

            echo "$name?t=" . time();

        }else{

            echo "error";

        }


    }else{
        echo "error";
    }

}else{
    echo "error";
}