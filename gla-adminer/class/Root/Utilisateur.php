<?php

namespace Root;


class Utilisateur {

    static function userById($id, $db, $r = 'index.php'){

        $user = $db->query('SELECT * FROM utilisateurs WHERE idU = ?',[$id])->fetch();

        if(!empty($user)){

            return $user;

        }else{

            \Func::redirect($r);

        }

    }

    static function userNameById($id, $db){

        $user = $db->query('SELECT nom,prenom FROM utilisateurs WHERE idU = ?',[$id])->fetch();

        if(!empty($user)){

            return "$user->nom $user->prenom";

        }else{

            return 'Null';

        }

    }

    static function insertUser($p, $db){

        if(!empty($p['nom']) && !empty($p['email']) && !empty($p['tele']) && !empty($p['wilaya']) && !empty($p['adresse']) && !empty($p['password']) && !empty($p['password_verif'])){

            if($p['password'] == $p['password_verif']){

                if(\Validation::between($p['nom'],2,128)){

                    \Func::setFlash('error',"Veuillez vérifier votre nom");

                    return false;

                }

                if (!filter_var($p['email'] , FILTER_VALIDATE_EMAIL)) {

                    \Func::setFlash('error',"Veuillez vérifier votre adresse email");

                    return false;

                }

                if (!\Validation::isUnique(trim($p['email']), 'email', 'utilisateurs', $db)) {

                    \Func::setFlash('error',"Adresse email déja utilisée dans un autre compte");

                    return false;

                }

                if(!preg_match("#^[05|06|07|+213]#", trim($p['tele']))){

                  \Func::setFlash('error',"Veuillez entrer un numéro de téléphone valide");

                  return false;

                }

                if(\Validation::numBetween($p['wilaya'],1,48)){

                    \Func::setFlash('error',"Veuillez sélectionner une wilaya valide");

                    return false;

                }

                extract($p);

                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

                $email_val = rand(10000, 99999);
                $tele_val = rand(10000, 99999);

                $app_token = md5(rand(0, 99999) . "_gla");

                $db->query("INSERT INTO utilisateurs (nom,email,tele,wilaya,adresse,avatar,password,date,email_val,tele_val,app_token,stt) VALUES (?,?,?,?,?,'',?,?,?,?,?,0)",[$nom, trim($email), trim($tele), $wilaya, $adresse, $password, date('Y-m-d H:i:s'), $email_val, $tele_val,$app_token]);

                \Mail::welcom_email_validation(trim($email), $nom, $email_val);

                \Func::setFlash('succes',"Bonjour <strong>$nom</strong>, Bienvenu sur votre espace membre <b>". \Config::get('site_title') ."</b> vous pouvez commander des produits, Vosu avez reçu un email de bienvenu et d'activation de votre adresse email $email");

                self::connectRegester($email, $db);

            }else{

                \Func::setFlash('error',"Veuillez vérifier votre mot de passe.");

                return false;

            }

        }

    }

    static function editUser($p, $db){

        if(!empty($p['nom']) && !empty($p['adresse']) && !empty($p['wilaya']) && !empty($p['tele'])){

            if(\Validation::between($p['nom'],2,128)){

                \Func::setFlash('error',"Veuillez vérifier votre nom et votre prénom");

                return false;

            }

            if(\Validation::numBetween($p['wilaya'],1,48)){

                \Func::setFlash('error',"Veuillez entrer une wilaya valide");

                return false;

            }

            $db->query("UPDATE utilisateurs SET nom = ?, wilaya = ?, adresse = ?, tele = ? WHERE idU = ?",[$p['nom'],$p['wilaya'],$p['adresse'],$p['tele'],$_SESSION['id']]);

            $_SESSION['name'] = $p['nom'];

            if(!empty($p['email'])){

                if(\Validation::isUniqueNotMinde(trim($p['email']), 'email', 'utilisateurs', $_SESSION['id'], $db)){

                    $db->query("UPDATE utilisateurs SET email = ? WHERE idU = ?",[trim($p['email']),$_SESSION['id']]);

                    $_SESSION['email'] = $p['email'];

                }

            }

            \Func::setFlash("succes", "Informations modifiées avec succes");

            \Func::redirect('#flash');

        }else{

            \Func::setFlash("error", "Tous les champs sont obligatoir");

            \Func::redirect('#flash');

        }

    }

    static function login($db,$post,$rem = false){

        extract($post);

        $user = $db->query('SELECT idU,nom,email,avatar,password FROM utilisateurs WHERE (email = :login OR tele = :login)',['login' => $login])->fetch();

        if(!empty($user)){

            if(password_verify($pass, $user->password)) {

                if ($rem) self::remember($user,$db);

                if (isset($_GET['token'])) self::validateEmail($user->email, $_GET['token'], $db);

                self::connect($user);

            }else{

                \Func::setFlash('error','Mot de passe incorrecte');

            }

        }else{

            \Func::setFlash('error','Veuillez vérefier votre email ou numéro de téléphone');

        }
    }

    static function connectRegester($email, $db){

        $user = $db->query('SELECT idU,nom,email,avatar FROM utilisateurs WHERE email = ?',[$email])->fetch();

        self::connect($user);

    }

    static function connect($u){

        $_SESSION['session'] = true;
        $_SESSION['id'] = $u->idU;
        $_SESSION['name'] = $u->nom;
        $_SESSION['email'] = $u->email;
        $_SESSION['avatar'] = $u->avatar;

        if(isset($_GET['r'])){

            \Func::redirect(WEBROOT.$_GET['r']);

        }else{

            \Func::redirect("dashboard");

        }

    }

    static function validateEmail($email, $token, $db){

        $verif = $db->query("SELECT idU FROM utilisateurs WHERE email = ? AND email_val = ?", [$email, $token])->fetch();

        if (!empty($verif)) {

            $db->query("UPDATE utilisateurs SET email_val = 0 WHERE email = ?", [$email]);
        }
    }

}
