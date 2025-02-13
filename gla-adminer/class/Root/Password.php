<?php

namespace Root;


class Password {

    static function recup($mail,$db){

        $user = $db->query("SELECT idU,email,date FROM utilisateurs WHERE email = ?",[$mail])->fetch();

        if(!empty($user->email)){

            $link = WEBROOT."page/password?recup=$user->idU&token=".sha1($user->email)."_Gla_".sha1($user->date);

            \Mail::passwordRecup($user->email, $link);

            \Func::setFlash('succes',"Un email de récupération de mot de passe à été envoyé à <strong>".$mail. "</strong>, Consultez votre boite mail pour réinitialiser votre mot de passe.");

            \Func::redirect('#');

        }else{

            \Func::setFlash('error',"L'adrese email que vous avez entré n'est associée à aucun compte");

            \Func::redirect('#');

        }

    }

    static function tokenVerification($get, $db){

        $user = $db->query("SELECT idU, email, date FROM utilisateurs WHERE idU = ?",[$get['recup']])->fetch();

        if(!empty($user->email)) {

            $token = sha1($user->email) . "_Gla_" . sha1($user->date);

            if($token == $get['token']) return true;

        }

        \Func::setFlash('error',"Veuillez entrer votre adresse email pour réinitialiser votre mot de passe");

        \Func::redirect('password#');

    }

    static function reset($post, $id, $db){

        if($post['password'] == $post['password_verif']){

            $password = password_hash($post['password'], PASSWORD_BCRYPT, ['cost' => 10]);

            $db->query("UPDATE utilisateurs SET password = ? WHERE idU = ?",[$password, $id]);

            \Func::setFlash('succes',"Votre mot de passe à été réinitialisé avec succes");

            \Func::redirect('signin-login');

        }

        \Func::setFlash('error',"Veuillez vérifier les mot de passes que vous avez entré");

        \Func::redirect('#');

    }

    static function editPassord($post, $db){

        extract($post);

        if(!empty($pass) && !empty($password) && !empty($password_verif)){

            if($password == $password_verif){

                $psw = $db->query("SELECT password FROM utilisateurs WHERE idU = ?",[$_SESSION['id']])->fetch();

                if(password_verify($pass, $psw->password)){

                    $npass = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

                    $db->query("UPDATE utilisateurs SET password = ? WHERE idU = ?",[$npass, $_SESSION['id']]);

                    \Func::setFlash('succes',"Mot de passe modifié avec succés");

                    \Func::redirect("#flash");


                }else{

                    \Func::setFlash('error','Veuillez vérifier votre mot de passe actuel');

                }

            }else{

                \Func::setFlash('error','Veuillez vérifier votre nouveau mot de passe');

            }

        }else{

            \Func::setFlash('error',"Veuillez remplire tous les champs obligatoir (*)");

        }

    }

}
