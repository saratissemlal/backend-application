<?php require "../../core/coreAjax.php";

if(!empty($_FILES) && isset($_POST['id'])){

    $db = BDD\App::getBDD();

    $img = \Recuperation\Galerie::imageById($_POST['id'],$db);

    if(empty($img->nameI)){

        echo 'Erreur';
        exit();

    }

    if(!empty($_FILES['image']['name']) && !empty($_FILES['image']['tmp_name'])){

        $type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $name =  Validation::toUrl($_FILES['image']['name']);
        $name = str_replace($type,'',$name);
        $name = "$name-".rand(1,99).".$type";

        $size =  $_FILES['image']['size'];

        $width = getimagesize($_FILES['image']['tmp_name']);

        require "../../lib/vendor/autoload.php";
        $manager = new \Intervention\Image\ImageManager();

        $manager->make($_FILES['image']['tmp_name'])->orientate()->interlace(true)->save("../../../theme/assets/img/slider/$name");

        $db->query("UPDATE image SET nameI = ?, sizeI = ?, widthI = ?,heightI = ? WHERE idI = ?",[$name,$size,$width[0],$width[1],$_POST['id']]);

        unlink("../../../theme/assets/img/slider/$img->nameI");

    }

    echo "GLAoK";

}else{

    echo "error";

}