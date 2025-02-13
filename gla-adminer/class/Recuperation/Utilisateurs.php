<?php

namespace Recuperation;

class Utilisateurs {

    static function getUtilisateurs($db,$limit){

      $limit = (isset($_GET['limit'])) ? 1000000 : $limit;

        $users = $db->query("SELECT * FROM utilisateurs ORDER BY idU DESC LIMIT $limit")->fetchAll();

        foreach($users AS $u){

            $affiliation = (!empty($u->ccp)) ? "<br><span class='green'>Affilié</span> Solde : <b>$u->solde</b> DA" : "";

            $tele_val = ($u->tele_val == 0) ? "<br><span class='green'>Validé</span>" : "";
            $email_val = ($u->email_val == 0) ? "<br><span class='green'>Validé</span>" : "";

            echo "<tr>";
            echo "<td>$u->idU</td>";
            echo "<td>$u->nom $affiliation</td>";
            echo "<td>$u->email $email_val</td>";
            echo "<td>$u->tele $tele_val</td>";
            echo "<td>" . \Func::ville($u->adresse) . "</td>";
            echo "<td>".date('d/m/Y à H:i', strtotime($u->date))."</td>";
            echo "<td class='actions'><a href='".WEBROOT."gla-adminer/orders.php?user=$u->idU' class='btn b-b'>Achats</a> <div class='flex'><a href='action/edit/user.php?id=$u->idU' class='btn b-g'><span class='icon'>&</span></a> <a onclick='confirm_action(event,this)' href='action/delete.php?table=utilisateurs&label=idU&id=$u->idU&r=utilisateurs.php' class='btn b-r'><span class='icon'>[</span></a></div></td>";
            echo "</tr>";

        }

    }

    static function utilisateurById($id, $db){

        return $db->query("SELECT * FROM utilisateurs WHERE idU = ?",[$id])->fetch();

    }

    static function editEtilisateur($post, $id, $db, $session = false){

        if(isset($post['nom'], $post['wilaya'], $post['adresse'], $post['email'], $post['tele'])){

            $db->query("UPDATE utilisateurs SET nom = ?, email = ?, tele = ?, wilaya = ?, adresse = ? WHERE idU = ?",[$post['nom'],$post['email'],$post['tele'],$post['wilaya'],$post['adresse'], $id]);

            if($session) $_SESSION['name'] = $post['nom'];

            \Func::setFlash("success", "Informations modifié avec succes");

            \Func::redirect('#flash');

        }else{

            \Func::setFlash("error", "Tous les champs sont obligatoir");

            \Func::redirect('#flash');

        }

    }

}
