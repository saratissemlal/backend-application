<?php

if(!empty($_POST['tag']) && $_POST['description'] !== ''){

    $db->query("UPDATE tags SET tag = ? ,description = ? WHERE idT = ?",[$_POST['tag'], $_POST['description'], $_GET['id']]);

    Func::setFlash('success','Le tag à été modifier avec success');

    Func::redirect('../../tags.php');

}else{
    Func::setFlash('error','Le tag et la description sont obligatoirs');
}