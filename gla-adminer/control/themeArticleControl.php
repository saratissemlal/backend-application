<?php

if(!empty($_POST)){

    extract($_POST);

    $db->query("UPDATE theme SET a_style = ?,a_w = ?,a_pp = ?",[$a_style,$a_w,$a_pp]);

    Func::setFlash('success','Thème modifiés avec success');

    $css = new Theme($db);

    $css->save('../theme/assets/css/base.css');

    Func::redirect('theme-article.php');

}else{
    Func::setFlash('error','Entrez des valeurs');
}