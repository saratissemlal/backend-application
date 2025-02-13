<?php require "../../core/coreAjax.php";

if(!empty($_FILES)){

    $db = BDD\App::getBDD();

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

        $db->query("INSERT INTO image(nameI,typeI,sizeI,widthI,heightI) VALUES (?,?,?,?,?)",[$name,'slider',$size,$width[0],$width[1]]);

    }

    echo "GLAoK";

}else{
    echo "error";
}