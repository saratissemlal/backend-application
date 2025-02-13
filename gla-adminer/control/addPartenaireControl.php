<?php

if(!empty($_POST['name']) && $_POST['imagenom'] !== ''){

    $db->query("INSERT INTO partenaires (name,image,date) VALUES (?,?,?)",[$_POST['name'], $_POST['imagenom'], time()]);

    Func::setFlash('success','Partenaire ajouté avec success');

    Func::redirect('../partenaires.php');

}else{
    Func::setFlash('error','Le nom est obligatoirs');
}