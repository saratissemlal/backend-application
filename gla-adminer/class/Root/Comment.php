<?php

namespace Root;

class Comment {

    static function commentForm($id,$c,$asset,$date,$db){

        if($c == 0) return false;

        //$f = $db->query("SELECT c_form,c_nbr,c_wt FROM theme")->fetch();

        $f = 'gla';

        switch($f){

            case 'gla' :

            echo "<h2 class='h fz11 mb20'>Avis de nos clients sur ce service</h2>";

                if(isset($_POST['gla-comment'], $_SESSION['id']) && !empty($_POST['gla-message'])) self::control($id,$db);

                echo "<div class='gla-comment'>";

                self::getComment($id,$asset,$date,$db);

                if(isset($_SESSION['id'])){

                  echo "<h3 class='mb20'>".$asset->text(24)."</h3>";

                  echo "<form method='POST' class='gla-form' id='gla-form'>";

                  echo \Func::getFlash();

                  echo "<input type='hidden' name='gla-id' value='$id' required='true'/>";
                  echo "<textarea name='gla-message' placeholder='".$asset->text(9)." ...' required='true' class='col-10 brc7 shadow'></textarea>";

                  echo "<input type='submit' name='gla-comment' value='".$asset->text(13)."' class='btn bg2 cl1 brc2 hover-bg3 hover-brc3 hover-cl2'/>";

                  echo "</form>";

                }else{

                  echo "<p class='rem'>".$asset->text(79)."</p>";

                }

                echo "</div>";

            break;

            case 'fb' :

                echo "<div id='fb-root'></div>";
                echo "<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = '//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8';fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>";
                echo "<div class='fb-comments' data-href='".WEBROOT.$_SERVER['REQUEST_URI']."' data-numposts='$f->c_nbr' data-width='100%'></div>";

            break;

            case 'gp' :

                echo "<script src='https://apis.google.com/js/plusone.js'></script>";
                echo "<div class='g-comments' data-href='https://www.globalads.dz' data-width='$f->c_wt' data-first_party_property='BLOGGER' data-view_type='FILTERED_POSTMOD'></div>";

            break;

            case 'no' : break;

        }

    }

    static function control($id,$db){

        $art = $db->query("SELECT idA FROM articles WHERE idA = ?",[$id])->fetch();

        if(!empty($art->idA)){

            $db->query("INSERT INTO comment (idA,user,comment,date) VALUES (?,?,?,?)",[$id,$_SESSION['id'], $_POST['gla-message'] ,time()]);

            \Func::setFlash('succes',self::getMessage('c_p',$db));

            \Func::redirect('#gla-form');

        }else{

            \Func::setFlash('error',self::getMessage('c_er',$db));

            return false;

        }

    }

    static function getComment($id,$asset,$date,$db){

        $com = $db->query("SELECT idC,comment,comment.date,nom,avatar FROM comment INNER JOIN utilisateurs ON idU = user WHERE (idA = ? AND statu = 1)",[$id])->fetchAll();

        echo "<div class='gla-comments'>";

        foreach ($com AS $c){

            echo "<div class='gla-com brc7 brc p10'>";

            echo \Func::profilePhoto($c->avatar);

            echo "<div class='col-8'>";

            echo "<span class='nom'>$c->nom</span>";
            echo "<span class='gla-com-time'> ".date($date,$c->date)."</span>";

            echo "<p>$c->comment</p>";

            echo "</div>";


            echo "</div>";

        }

        echo "</div>";


    }

    static function getMessage($msg,$db){

        $message = $db->query("SELECT $msg AS msg FROM commentsmessages")->fetch();

        return $message->msg;

    }
    

}
