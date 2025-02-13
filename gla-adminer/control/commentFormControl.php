<?php

if(!empty($_POST)){

    extract($_POST);

    $db->query("UPDATE theme SET c_form = ?, c_nbr = ?, c_wt = ?",[$c_form,$c_nbr,$c_wt]);

    $db->query("UPDATE commentsmessages SET n_cmpl = ?, c_vrf = ?, c_p = ?, c_er = ?",[$n_cmpl,$c_vrf,$c_p,$c_er]);

    Func::setFlash('success','Formulaire de commentaires modifié avec success');

    Func::redirect('comment-form.php');

}else{
    Func::setFlash('error','Entrez des valeurs');
}