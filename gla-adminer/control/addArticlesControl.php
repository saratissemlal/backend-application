<?php

if(!empty($_POST['title']) && $_POST['content'] !== '' && !empty($_POST['titlear']) && $_POST['contentar'] !== ''){

    if(Validation::alphaNum($_POST['title'])){

        $url = Validation::toUrl($_POST['title']);

        $existe = $db->query("SELECT COUNT(*) AS nbr FROM articles WHERE url = ?", [$url])->fetch();

        if($existe->nbr > 0) {
            $i = 1;
            while (true) {
                $i = $i + 1;
                $url2 = "$url-$i";
                $exist = $db->query("SELECT COUNT(*) AS nbr FROM articles WHERE url = ?", [$url2])->fetch();
                if ($exist->nbr == 0) {
                    $url = $url2;
                    break;
                }
            }
        }

        $showcomments = (isset($_POST['showcomments'])) ? 1 : 0;

        $price_min = (!empty($_POST['price_min'])) ? $_POST['price_min'] : 0;
        $price_max = (!empty($_POST['price_max'])) ? $_POST['price_max'] : 0;

        $categorie = (!empty($_POST['categorie'])) ? $_POST['categorie'] : 0;
        $parent = (!empty($_POST['parent'])) ? $_POST['parent'] : 0;

        $db->query("INSERT INTO articles (title,titlear,url,categorie,parent,image,content,contentar,price_min,price_max,date,idB,showc) VALUES (?,?,?,?,?,?,?,?,?,?,?,0,?)",[$_POST['title'], $_POST['titlear'], $url, $categorie, $parent, $_POST['imagenom'],$_POST['content'], $_POST['contentar'], $price_min, $price_max, time(), $showcomments]);

        $article = $db->query("SELECT idA FROM articles WHERE url = ?",[$url])->fetch();

        /*
        if(!empty($_POST['tag'])){

            foreach($_POST['tag'] AS $t){

                $db->query("INSERT INTO tag (t,a) VALUES (?,?)",[$t,$article->idA]);

            }

        }
        */

        Func::setFlash('success','Article ajouté avec success');

        Func::execute(WEBROOT."sitemap/article.php");

        Func::redirect('../articles.php');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre et le contenu sont obligatoirs');
}