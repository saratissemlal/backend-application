<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])){

        if(!empty($_POST['nowPass']) && !empty($_POST['newPass']) && !empty($_POST['rNewPass'])){

            $psw = $db->query("SELECT password FROM user")->fetch();

            if($_POST['newPass'] == $_POST['rNewPass']){

                if(password_verify($_POST['nowPass'], $psw->password)){

                    $npass = password_hash($_POST['newPass'], PASSWORD_BCRYPT, ['cost' => 10]);

                    $db->query("UPDATE user SET password = ? WHERE id = 1",[$npass]);

                    Func::setFlash('success','Mot de passe modifier avec success');

                    Func::redirect('');

                }else{

                    Func::setFlash('error','Veuillez vérifier votre mot de passe acctuel');

                }

            }else{

                Func::setFlash('error','Veuillez vérifier votre nouveau mot de passe');

            }

        }else{

            Func::setFlash('error','Veuillez vérifier les champs');

        }

    }

    $param = \Recuperation\Admin::parametres($db);

    $titre = 'Paramètres - Global Ads';

    include "inc/_head.php";

    include "inc/_parametres.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}