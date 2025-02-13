<?php

if(!empty($_POST['ptitle']) && !empty($_POST['pcontent']) && !empty($_POST['ptitlear']) && !empty($_POST['pcontentar'])){

    if(Validation::alphaNum($_POST['ptitle'])){

        $url = Validation::toUrl($_POST['ptitle']);

        $existe = $db->query("SELECT COUNT(*) AS nbr FROM pages WHERE url = ?", [$url])->fetch();

        if($existe->nbr > 0) {
            $i = 1;
            while (true) {
                $i = $i + 1;
                $url2 = "$url-$i";
                $exist = $db->query("SELECT COUNT(*) AS nbr FROM pages WHERE url = ?", [$url2])->fetch();
                if ($exist->nbr == 0) {
                    $url = $url2;
                    break;
                }
            }
        }

        $db->query("INSERT INTO pages (name,namear,url,content,contentar,date) VALUES (?,?,?,?,?,?)",[$_POST['ptitle'], $_POST['ptitlear'], $url, $_POST['pcontent'], $_POST['pcontentar'], time()]);

        Func::setFlash('success','Page ajouté avec success');

        Func::execute(WEBROOT."sitemap/page.php");

        Func::redirect('../pages.php');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre et le contenu sont obligatoirs');
}