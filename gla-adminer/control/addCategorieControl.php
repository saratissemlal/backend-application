<?php

if(!empty($_POST['ctitle']) && !empty($_POST['ctitlear'])){

    if(Validation::alphaNum($_POST['ctitle'])){

        $url = Validation::toUrl($_POST['ctitle']);

        $existe = $db->query("SELECT COUNT(*) AS nbr FROM categories WHERE url = ?", [$url])->fetch();

        if($existe->nbr > 0) {
            $i = 1;
            while (true) {
                $i = $i + 1;
                $url2 = "$url-$i";
                $exist = $db->query("SELECT COUNT(*) AS nbr FROM categories WHERE url = ?", [$url2])->fetch();
                if ($exist->nbr == 0) {
                    $url = $url2;
                    break;
                }
            }
        }

        $parent = ($_POST['cparent'] == '0') ? 0 : $_POST['cparent'];

        $db->query("INSERT INTO categories (name,namear,url,parent,image,description,descriptionar,content,contentar,date) VALUES (?,?,?,?,?,?,?,?,?,?)",[$_POST['ctitle'], $_POST['ctitlear'], $url, $parent, $_POST['imagenom'],$_POST['cdesc'], $_POST['cdescar'], $_POST['content'], $_POST['contentar'],time()]);

        Func::setFlash('success','Catégorie ajouté avec success');

        Func::execute(WEBROOT."sitemap/categorie.php");

        //Func::redirect('../categories.php');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre est obligatoir');
}