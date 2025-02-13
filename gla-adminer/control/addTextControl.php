<?php

if(!empty($_POST['texte']) && !empty($_POST['textear'])){

    $db->query("INSERT INTO texte (texte) VALUES (?)",[$_POST['texte']]);
    $db->query("INSERT INTO textear (texte) VALUES (?)",[$_POST['textear']]);

    Func::setFlash('success','Texte ajouté avec success');

    Func::redirect('../textes.php');

}else{
    Func::setFlash('error','Les textes sont obligatoir');
}