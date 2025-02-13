<?php

/**
 * Created by PhpStorm.
 * User: Khaled
 * Date: 26/02/2019
 * Time: 11:21
 */

namespace Root;


class Panier
{

    static function getCommandes($db){

        if(isset($_GET['commandes'])){

            if($_GET['commandes'] == 2){

                $filter = " AND panier.stt = 2";

            }else{

                $filter = " AND panier.stt != 2";

            }

        }else{

            $filter = "";

        }

        $panier = $db->query("SELECT panier, panier.idA, panier.qtt, panier.prix, livraison, panier.stt, panier.date, title, url, image  FROM panier INNER JOIN articles ON articles.idA = panier.idA WHERE idU = ?$filter", [$_SESSION['id']])->fetchAll();

        foreach ($panier as $p) {

?>

            <div class="produit flex panier article brc shadow brc7" style="font-size: 0.9em">

                <div class="flex ref ai-center jc-start col-5">
                    <img src="<?= WEBROOT ?>gla-adminer/uploads/article/small/<?= $p->image ?>" style="width:90px;height: 90px;margin-right: 10px"/>
                    <div>
                        <span>Ref : <?= $p->idA ?>.</span>
                        <span><?= $p->title ?></span>
                    </div>
                </div>

                <div class="dt">
                    <span><?= date('d/m/Y à H:i', strtotime($p->date)) ?>h</span><br>
                    <span>Quantité : <?= $p->qtt ?></span><br>
                    <span class="price">Prix unitaire: <?= number_format($p->prix, 0, '', ' ') ?> DA</span><br>
                    <span class="price">Prix total: <?= number_format($p->prix * $p->qtt, 0, '', ' ') ?> DA</span><br>

                    <?php

                    if ($p->stt == 0) {

                        echo "<strong style='color:#0000ff'>Demande envoyé</strong>";

                    } elseif ($p->stt == 1) {

                        echo "<strong style='color:green'>Livraison en cours</strong>";

                    } else {

                        echo "<strong class='cl3'>Vente finalisé</strong>";

                    }

                    ?>

                </div>

                <a href="<?= WEBROOT . $p->url ?>" class="btn icon btn_show_prod cl3">&#xe93d</a>

            </div>

        <?php

        }
    }

    static function panierUse($id, $db){

        $p = $db->query("SELECT idA FROM articles WHERE idA = ?", [$id])->fetch();

        if (!empty($p)) {

            if (!in_array($id, $_SESSION['panier']['produits'])) {

                if ($_POST['add'] == 'true') {

                    array_push($_SESSION['panier']['produits'], $id);

                    $_SESSION['panier']['nbr'] = $_SESSION['panier']['nbr'] + 1;
                }
            } else {

                if ($_POST['add'] == 'false') {

                    if (($key = array_search($id, $_SESSION['panier']['produits'])) !== false) {

                        unset($_SESSION['panier']['produits'][$key]);

                        $_SESSION['panier']['nbr'] = $_SESSION['panier']['nbr'] - 1;
                    }
                }
            }

            $cookie_val = $_SESSION['panier']['nbr'] . ".";

            foreach ($_SESSION['panier']['produits'] as $p) {


                $cookie_val .= "$p.";
            }

            if ($_SESSION['panier']['nbr'] !== 0) setcookie('kh_globalads_dz', trim($cookie_val, '.'), time() + (3600 * 24 * 30), '/');
        }

        echo $_SESSION['panier']['nbr'];
    }

    static function envoyerPanier($post, $db){

        $nbr = count($post['id']) - 1;

        $panier = uniqid();

        for ($i = 0; $i <= $nbr; $i++) {

            $prod = $db->select('idA, prix, remise', 'articles')->where("idA = ?")->find([$post['id'][$i]]);

            if (!empty($post['id'][$i]) && !empty($post['qtt'][$i]) && !empty($post['montant'][$i])) {

                $montant = (!empty($prod->remise)) ? $prod->remise : $prod->prix;

                $db->query("INSERT INTO panier (panier, idU, idA, qtt, prix, livraison, stt, date) VALUES (?,?,?,?,?,?,0,?)", [$panier, $_SESSION['id'], $prod->idA, $post['qtt'][$i], $montant, $_POST['livraison'], date('Y-m-d H:i:s')]);
            }
        }

        $_SESSION['panier']['nbr'] = 0;
        $_SESSION['panier']['produits'] = [];

        \Func::setFlash("succes", "Votre commande à été envoyé à ". \Config::get('site_name') ." avec succes");

        \Mail::envoyerPanier();

        \Func::redirect(WEBROOT . "page/dashboard#flash");
    }

}
