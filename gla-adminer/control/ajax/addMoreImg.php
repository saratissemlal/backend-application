<?php require "../../core/coreAjax.php";

if(!empty($_FILES) && isset($_POST['id'])){

    $db = BDD\App::getBDD();

    foreach ($_FILES as $k => $f) {

        if (!empty($f['tmp_name'])) {

            $type = 'jpg';//pathinfo($f['name'], PATHINFO_EXTENSION);

            $img = strtoupper(uniqid());

            $size =  $_FILES[$k]['size'];

            $width = getimagesize($f['tmp_name']);

            require "../../lib/vendor/autoload.php";
            $manager = new \Intervention\Image\ImageManager();

            if($width > 800){
                $manager->make($f['tmp_name'])->orientate()->resize(Config::get('img_full'),null,function($c){$c->aspectRatio();})->interlace(true)->save('../../uploads/image/'.$img.'.'.$type);
            }else{
                $manager->make($f['tmp_name'])->orientate()->save('../../uploads/image/'.$img.'.'.$type);
            }

        //$db->query("INSERT INTO image(prI,nameI) VALUES (?,?)",[$_POST['id'], $img]);
        $db->query("INSERT INTO image(prI,nameI,typeI,sizeI,widthI,heightI) VALUES (?,?,?,?,?,?)",[$_POST['id'],$img.'.'.$type,'article',$size,$width[0],$width[1]]);


        }

    }

    echo "GLAoK";

}else{
    echo "error";
}