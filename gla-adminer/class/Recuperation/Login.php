<?php
namespace Recuperation;

class Login {

    static function login($db,$usr,$pass,$rem = false){

        $user = $db->query('SELECT name,password FROM user WHERE pseudo = :pseudo',['pseudo' => $usr])->fetch();

        if(!empty($user)){

            if(password_verify($pass, $user->password)) {

                if ($rem) self::remember($user,$db);

                self::history($db,'Connexion');

                self::connect($user);

            }else{

                \Func::setFlash('error','Mot de passe incorrecte');

            }

        }else{

            \Func::setFlash('error','Login incorrecte');

        }
    }

    static function connect($u){

        $_SESSION['name'] = $u->name;
        $_SESSION['gla-adminer'] = 'gla-adminer';

        \Func::redirect("index.php");

    }

    static function remember($u,$db){

        $tok = openssl_random_pseudo_bytes(24);
        $sel = openssl_random_pseudo_bytes(9);

        while(self::unique($sel,$db) > 0){

            $sel = openssl_random_pseudo_bytes(9);

        }

        $db->query("INSERT INTO remember (sel,tok,user,ex) VALUES (?,?,?,DATE_ADD(NOW(), INTERVAL 30 DAY))",[$sel,hash('sha256',$tok),$u->name]);

        setcookie('GLA118',base64_encode($sel).':'.base64_encode($tok),time()+1209600,'/',null,false,true);

    }

    static  function unique($sel,$db){

        $q = $db->query("SELECT null FROM remember WHERE sel = ?",[$sel])->fetchAll();

        return count($q);
    }

    static function rememberLogin($db,$cookie){

        $sp = explode(':',$cookie);

        if(count($sp) == 2){

            list($sel,$tok) = $sp;

            $rem = $db->query("SELECT id,tok,user FROM remember WHERE sel = ? AND ex >= CURDATE()",[base64_decode($sel)])->fetch();

            if($rem){

                if(hash_equals($rem->tok, hash('sha256',base64_decode($tok)))) {

                    $user = $db->query('SELECT name,password FROM user WHERE pseudo = :pseudo',['pseudo' => $rem->user])->fetch();

                    self::updateCookie($db,$rem->id,$sel,$tok);

                    self::history($db,'Cookie');

                    self::connect($user);

                }
            }
        }
    }

    static function updateCookie($db,$id,$sel,$tok){

        $db->query("UPDATE remember SET ex = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE id = ?",[$id]);

        setcookie('GLA118',$sel.':'.$tok,time()+1209600,'/',null,false,true);

    }

    static function history($db,$loged){

        $db->query("INSERT INTO loginhistory (ip,agent,loged,date) VALUES (?,?,?,?)",[$_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'],$loged,time()]);

    }

} 