<?php

namespace Recuperation;

class Panier {

    static function getCommandes($db, $limit){

        $cond = '';

        if(isset($_GET['stt'])) $cond = " AND panier.stt = ". $_GET['stt'];

        if(isset($_GET['user'])) $cond = " AND panier.idU = ". $_GET['user'];

        $limit = (isset($_GET['limit'])) ? 1000000 : $limit;

        $panier = $db->query("SELECT idP, panier, panier.idU, panier.idA, panier.qtt, panier.prix, livraison, panier.stt, panier.date, title, url, image, articles.qtt AS qt, nom, adresse, tele  FROM panier INNER JOIN articles ON articles.idA = panier.idA INNER JOIN utilisateurs ON utilisateurs.idU = panier.idU WHERE idP != 0 $cond ORDER BY date DESC LIMIT $limit")->fetchAll();

        $commande = '';

        foreach ($panier as $p) {

            if($commande == '') $commande = $p->panier;

            if($commande !== $p->panier){

                echo "<tr style='background: #999;margin: 0;padding: 0'><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";

                $commande = $p->panier;

            }

            $aff = (!empty($p->aff) && !empty($p->aff_p)) ? "<br><a href='". WEBROOT ."gla-adminer/action/edit/user.php?id=$p->aff' class='green' title='affiliation'>Aff</a> <b>$p->aff_p</b> DA" : "";

            echo "<tr>";
            echo "<td>$p->idP</td>";
            echo "<td><a href='".WEBROOT."gla-adminer/action/edit/user.php?id=$p->idU'>$p->nom</a><br>$p->tele<br>$p->adresse</td>";
            echo "<td>$p->title<br>Restant (Stock) : <strong>$p->qt</strong> <a href='".WEBROOT."gla-adminer/action/edit/article.php?id=$p->idA'>Modifier</a></td>";
            echo "<td><img src='".WEBROOT."gla-adminer/uploads/article/small/$p->image'/></td>";
            echo "<td>($p->qtt) / $p->prix $aff</td>";
            echo "<td><strong>". number_format($p->qtt * $p->prix, 0, '', ' ') ." DA</strong></td>";
            echo "<td>$p->date</td>";
            echo "<td>";

            if($p->stt == 0){

                echo "<a onclick='confirm_action(event,this)' href='".WEBROOT."gla-adminer/action/validate.php?id=$p->idP&stt=1&qtt=$p->qtt' class='btn b-g'>Valider & Livrer</a>";

            }elseif($p->stt == 1){

              echo "<a onclick='confirm_action(event,this)' href='".WEBROOT."gla-adminer/action/validate.php?id=$p->idP&stt=2&qtt=$p->qtt' class='btn b-b'>Marquer comme vendu</a>";
              echo "<a onclick='confirm_action(event,this)' href='".WEBROOT."gla-adminer/action/validate.php?id=$p->idP&stt=0&qtt=$p->qtt' class='btn b-gr'>Annuler la validation</a>";

            }else{

                echo "<span class='btn b-gr'>Vendu</span>";

            }

            echo "<a onclick='confirm_action(event,this)' href='".WEBROOT."gla-adminer/action/delete.php?table=panier&label=idP&id=$p->idP&r=orders.php' class='btn b-r'>Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function envoyerPanier($post, $db){

        $nbr = count($post['id']) - 1;

        $panier = uniqid();

        for($i = 0 ; $i <= $nbr ; $i++){

            if(!empty($post['id'][$i]) && !empty($post['qtt'][$i]) && !empty($post['montant'][$i])){

                $db->query("INSERT INTO panier (panier, idU, idA, qtt, prix, livraison, stt, date) VALUES (?,?,?,?,?,?,0,?)",[$panier, $_SESSION['id'], $post['id'][$i], $post['qtt'][$i], $post['montant'][$i], $_POST['livraison'], date('Y-m-d H:i:s')]);

            }

        }

        \Func::setFlash("succes", "Votre commande à été envoyé à MAX FRAME avec succes");

        \Func::redirect(WEBROOT."page/dashboard#flash");

    }

    static function getConfigs($db, $limit){

        $cond = '';

        if(isset($_GET['stt'])) $cond = " AND stt = ". $_GET['stt'];
        if(isset($_GET['user'])) $cond = " AND panier.idU = ". $_GET['user'];

        $configs = $db->query("SELECT idC, config.idU, message, total, config.date, nom, adresse FROM config INNER JOIN utilisateurs ON utilisateurs.idU = config.idU WHERE idC != 0 $cond ORDER BY date DESC")->fetchAll();

        foreach ($configs as $p) {

            echo "<tr>";
            echo "<td>$p->idC</td>";
            echo "<td><a href='".WEBROOT."gla-adminer/action/edit/user.php?id=$p->idU'>$p->nom</a><br>$p->adresse</td>";
            echo "<td>$p->message</td>";
            echo "<td><strong>". number_format($p->total, 0, '', ' ') ." DA</strong></td>";
            echo "<td>". date('d/m/Y H', $p->date) ."h</td>";
            echo "<td>";

            echo "<a href='".WEBROOT."gla-adminer/action/config.php?id=$p->idC' class='btn b-b'>Voir</a> <a onclick='confirm_action(event,this)' href='".WEBROOT."gla-adminer/action/delete.php?table=config&label=idC&id=$p->idC&r=config.php' class='btn b-r'>Supprimer</a></td>";

            echo "</tr>";

        }

    }

    static function getHard($id, $db){

        if(!empty($id)){

            $p = $db->query("SELECT title,prix,remise,image,qtt FROM articles WHERE idA = ?",[$id])->fetch();

            if(!empty($p)){

                return "<td>$p->title</td><td>". number_format($p->prix, 0, '', ' ') ." DA</td><td><img src='".WEBROOT."gla-adminer/uploads/article/small/$p->image'></td><td>$p->qtt Restant</td>";


            }

        }

        return "<td>---</td><td>0 DA</td><td>---</td><td>---</td>";

    }

}
