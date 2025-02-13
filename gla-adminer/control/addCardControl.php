<?php

if(!empty($_POST['url']) && $_POST['imagenom'] !== ''){

    $db->query("INSERT INTO cards (url,image,date) VALUES (?,?,?)",[$_POST['url'], $_POST['imagenom'], time()]);

    Func::setFlash('success','Card ajouté avec success');

    Func::redirect('../cards.php');

}else{
    Func::setFlash('error','L\url est l\image sont obligatoirs');
}