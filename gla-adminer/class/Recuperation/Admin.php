<?php
namespace Recuperation;


class Admin {

    static private $result_per_page = 15;

    static function siteInformations($db){
        return $db->query("SELECT * FROM site")->fetch();
    }

    static function themeInformations($db){
        return $db->query("SELECT * FROM theme")->fetch();
    }

    static function commentsMessage($db){
        return $db->query("SELECT * FROM commentsmessages")->fetch();
    }

    static function parametres($db){
        return $db->query("SELECT * FROM parametres")->fetch();
    }

    static function getPages($db,$limit){

        $pages = $db->query("SELECT idP,name,url FROM pages WHERE admin = 0 LIMIT $limit")->fetchAll();

        foreach($pages AS $key => $p){

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$p->name</td>";
            echo "<td>$p->url</td>";
            echo "<td><a href='action/edit/page.php?id=$p->idP' class='btn b-g'><span class='icon'>&</span> Modifier</a> <a href='action/delete.php?table=pages&label=idP&id=$p->idP&r=pages.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getCategories($db,$limit){

        $cat = $db->query("SELECT idC,name,url,parent,description FROM categories LIMIT $limit")->fetchAll();

        foreach($cat AS $key => $p){

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$p->name</td>";
            echo "<td>$p->url</td>";
            echo "<td>".self::getCatById($p->parent,$db)."</td>";
            echo "<td>".substr($p->description,0,60)."...</td>";
            echo "<td><a href='action/edit/categorie.php?id=$p->idC' class='btn b-g'><span class='icon'>&</span> Modifier</a> <a href='action/delete.php?table=categories&label=idC&id=$p->idC&r=categories.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getCategoriesList($db){

        $cats = $db->query("SELECT idC,name,url FROM categories")->fetchAll();

        return $cats;

    }

    static function getArticles($db,$limit){
        
        if(isset($_GET['limit'])) $limit = 1000000;

        $where_filter = '';

        if(isset($_GET['cat']) && $_GET['cat'] !== '0') $where_filter .= ' AND categorie = ' . $_GET['cat'];
        if(isset($_GET['parent']) && $_GET['parent'] !== '0'){

            $where_filter .= ' AND parent = ' . $_GET['parent'];

        }else{

            $where_filter .= ' AND parent = 0';

        }

        $art = $db->query("SELECT idA,title,categorie,parent,image,price_min,price_max,date FROM articles WHERE idA != 0$where_filter ORDER BY idA DESC LIMIT $limit")->fetchAll();

        foreach($art AS $key => $a){

            $n = $db->query("SELECT COUNT(idI) AS n FROM image WHERE (prI = ? && typeI = ?)",[$a->idA,'article'])->fetch();
            $childs = $db->query("SELECT COUNT(idA) AS n FROM articles WHERE parent = ?",[$a->idA])->fetch();

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            if($a->price_min > 0){
                echo "<td>$a->title</td>";
            }else{
                echo "<td><a href='?parent=$a->idA' title='Consulter Sous articles'><strong>$a->title</strong></a><br><br>($childs->n) sous articles</td>";
            }
            echo "<td><img src='".WEBROOT."gla-adminer/uploads/article/small/$a->image'></td>";
            echo "<td>$a->price_min / $a->price_max</td>";
            echo "<td>".date('d/m/Y à H:i',$a->date)."</td>";
            echo "<td><a href='action/addPics.php?id=$a->idA' class='btn b-gr' title='Ajouter des Images'>$n->n <span class='icon'>D</span></a> . <a href='action/edit/article.php?id=$a->idA&parent=$a->parent' class='btn b-g'><span class='icon'>&</span> Modifier</a> <a href='action/delete.php?table=articles&label=idA&id=$a->idA&r=articles.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getArticlesList($db){

        $articles = $db->query("SELECT idA,title,parent FROM articles")->fetchAll();

        foreach ($articles as $a) {

            $selected = (isset($_GET['parent']) && $_GET['parent'] == $a->idA) ? 'selected' : '';

            echo "<option value='$a->idA' $selected>$a->title</option>";

        }

    }

    static function getComments($db,$limit){

        $com = $db->query("SELECT idC,comment,comment.date,statu,nom,avatar,title FROM comment INNER JOIN utilisateurs ON idU = user INNER JOIN articles On articles.idA = comment.idA ORDER BY idC DESC LIMIT $limit")->fetchAll();

        foreach($com AS $key => $a){

            $valider = ($a->statu == 0) ? "<a href='action/commentValidate.php?id=$a->idC' class='btn b-g' title='Valider'><span class='icon'>W</span> Valider</a> . " : '';

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>" . \Func::profilePhoto($a->avatar, 'c-avt') . "</td>";
            echo "<td>$a->nom</td>";
            echo "<td>$a->title</td>";
            echo "<td>$a->comment</td>";
            echo "<td>".date('d/m/Y à H:i',$a->date)."</td>";
            echo "<td>$valider<a href='action/delete.php?table=comment&label=idC&id=$a->idC&r=commentaires.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getAlbums($db){

        $art = $db->query("SELECT idA,title,image,description,date FROM album ORDER BY idA DESC")->fetchAll();

        foreach($art AS $key => $a){

            $n = $db->query("SELECT COUNT(idI) AS n FROM image WHERE prI = ? AND type = 1",[$a->idA])->fetch();

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$a->title</td>";
            echo "<td><img src='".$_SESSION['Root']."gla-adminer/uploads/article/small/$a->image'></td>";
            echo "<td>".date('d/m/Y à H:i',$a->date)."</td>";
            echo "<td><a href='action/addPics.php?id=$a->idA&type=album' class='btn b-gr' title='Ajouter des Images'>$n->n <span class='icon'>D</span></a> . <a href='action/delete.php?table=album&label=idA&id=$a->idA&r=galerie.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getPartenaires($db, $limit){

        $part = $db->query("SELECT idP,name,image,date FROM partenaires ORDER BY idP DESC")->fetchAll();

        foreach($part AS $key => $a){

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$a->name</td>";
            echo "<td><img src='".WEBROOT."gla-adminer/uploads/article/small/$a->image'></td>";
            echo "<td>".date('d/m/Y à H:i',$a->date)."</td>";
            echo "<td><a href='action/delete.php?table=partenaires&label=idP&id=$a->idP&r=partenaires.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getCards($db, $limit){

        $part = $db->query("SELECT idC,url,image,date FROM cards ORDER BY idC DESC")->fetchAll();

        foreach($part AS $key => $a){

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$a->url</td>";
            echo "<td><img src='".WEBROOT."gla-adminer/uploads/article/small/$a->image'></td>";
            echo "<td>".date('d/m/Y à H:i',$a->date)."</td>";
            echo "<td><a href='action/delete.php?table=cards&label=idC&id=$a->idC&r=cards.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getParentCats($db){

        $cats =  $db->query("SELECT idC,name FROM categories WHERE parent = ''")->fetchAll();

        foreach($cats AS $c){

            echo "<option value='$c->idC'>$c->name</option>";
        }

    }

    static function getCats($db){

        $cats =  $db->query("SELECT idC,name,parent FROM categories WHERE parent = ''")->fetchAll();

        foreach($cats AS $c){

            $selected = (isset($_GET['cat']) && $_GET['cat'] == $c->idC) ? 'selected' : '';

            echo "<option value='$c->idC' $selected>$c->name</option>";
            echo self::getSousCats($c->idC,$c->name,$db);

        }

    }

    static function getSousCats($id,$name,$db){

        $cats =  $db->query("SELECT idC,name FROM categories WHERE parent = ?",[$id])->fetchAll();

        foreach($cats AS $c){

            echo "<option value='$c->idC'>$name : $c->name</option>";

        }

    }

    static function getCatById($id,$db){
        if($id == 0) return "";
        $cat =  $db->query("SELECT name,parent FROM categories WHERE idC = ?",[$id])->fetch();
        if(!empty($cat->parent)){
            $parent = self::getCatById($cat->parent,$db);
            return $parent.', '.$cat->name;
        }else{
            return $cat->name;
        }
    }

    static function getMenu($db,$limit){

        $menu = $db->query("SELECT idM,name,url FROM menu ORDER BY place ASC LIMIT $limit")->fetchAll();

        foreach($menu AS $key => $p){

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$p->name</td>";
            echo "<td>$p->url</td>";
            echo "<td><a href='action/edit/menu.php?id=$p->idM' class='btn b-g'><span class='icon'>&</span> Modifier</a> <a href='action/delete.php?table=menu&label=idM&id=$p->idM&r=menu.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getMenuPlace($db){

        $menu = $db->query("SELECT idM,name,place,parent FROM menu ORDER BY place ASC")->fetchAll();

        if(empty($menu)) return false;

        foreach($menu AS $m){

            if($m->parent == 0){

                $tab[$m->idM] = $m;

            }

        }

        foreach($menu AS $key => $m){

            if($m->parent !== 0){

                $tab[$m->parent]->sous[$m->idM] = $m;

            }

        }

        unset($tab[0]);

        foreach($tab AS $key => $m){

            if(empty($m->sous)){

                echo "<li><a href='#'><span class='icon'>ç</span></a> $m->name <a href='#'><span class='icon'>ê</span></a></li>";

            }else{

                echo "<li><a href='#'><span class='icon'>ç</span></a> $m->name <a href='#'><span class='icon'>ê</span></a>";

                echo "<ul>";

                foreach($m->sous AS $sm){

                    echo "<li>$sm->name</li>";

                }

                echo "</ul>";

                echo"</li>";

            }

        }

    }

    static function getCatsMenu($db){

        $cats =  $db->query("SELECT idC,name,url FROM categories")->fetchAll();

        foreach($cats AS $c){
            echo "<option value='categorie/$c->url'>$c->name</option>";
        }

    }

    static function getPagesMenu($db){

        $pages =  $db->query("SELECT idP,name,url FROM pages")->fetchAll();

        foreach($pages AS $p){
            echo "<option value='page/$p->url'>$p->name</option>";
        }

    }

    static function getParentMenu($db){

        $menu =  $db->query("SELECT idM,name FROM menu WHERE parent = 0")->fetchAll();

        foreach($menu AS $m){
            echo "<option value='$m->idM'>$m->name</option>";
        }

    }

    static function getMorePics($id,$db,$type = false){

        if(!$type){

            return $db->query("SELECT nameI FROM image WHERE prI = ?",[$id])->fetchAll();

        }else{

            return $db->query("SELECT nameI FROM image WHERE prI = ? AND type != 0",[$id])->fetchAll();

        }

    }

    static function getMessages($db,$limit){

        $msg = $db->query("SELECT idC,name,email,numero,message,date,statu FROM contact ORDER BY idC DESC LIMIT $limit")->fetchAll();

        foreach($msg AS $key => $m){

            echo "<tr>";
            echo "<td>".($key + 1)."</td>";
            echo "<td>$m->name</td>";
            echo "<td>$m->numero / <a href='mailto:$m->email'>$m->email</a></td>";
            echo "<td>$m->message</td>";
            echo "<td>".date('d/m/Y à H:i', $m->date)."</td>";
            echo "<td><a href='action/delete.php?table=contact&label=idC&id=$m->idC&r=contact.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getServicesCommandes($db,$limit){

        $cond = '';

        if (isset($_GET['stt'])) $cond = " AND stt = " . $_GET['stt'];

        $limit = (isset($_GET['limit'])) ? 1000000 : $limit;

        $commande = $db->query("SELECT * FROM commande WHERE idC != 0$cond ORDER BY idC DESC LIMIT $limit")->fetchAll();

        foreach($commande AS $c){

            $intervention = ($c->type == 1) ? "<strong>En urgence</strong>" : "RDV : " . date('d/m/Y à H:i', strtotime($c->date_intervention));
            $gps = (!empty($c->gps)) ? " . <a href='https://www.google.com/maps/dir/$c->gps' target='_blank' class='icon'>0</a>" : "";

            echo "<tr>";
            echo "<td>$c->idC</td>";
            echo "<td>$c->nom $c->prenom <br>$c->adresse $gps</td>";
            echo "<td>$c->tel <br>$c->email</td>";
            echo "<td>$c->besoin_title <br> $c->besoin_price<br> $c->dscr</td>";
            echo "<td>$intervention</td>";
            echo "<td>$c->platforme</td>";
            echo "<td>".date('d/m/Y à H:i', strtotime($c->created_at))."</td>";
            echo "<td style='display:flex'>";

            if ($c->stt == 0) {

                echo "<a onclick='confirm_action(event,this)' href='" . WEBROOT . "gla-adminer/action/validate.php?id=$c->idC&stt=1' class='btn b-g'>Valider</a>";
            
            } elseif ($c->stt == 1) {

                echo "<a onclick='confirm_action(event,this)' href='" . WEBROOT . "gla-adminer/action/validate.php?id=$c->idC&stt=2' class='btn b-b'>Marquer comme finalisée</a>";
                echo "<a onclick='confirm_action(event,this)' href='" . WEBROOT . "gla-adminer/action/validate.php?id=$c->idC&stt=0' class='btn b-gr'>Annuler la validation</a>";
            
            } else {

                echo "<span class='btn b-gr'>Finalisée</span>";

            }
            
            echo "<a  onclick='confirm_action(event,this)' href='action/delete.php?table=commande&label=idC&id=$c->idC&r=orders.php' class='btn b-r'>Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function getHistory($db){

        $history = $db->query("SELECT * FROM loginhistory ORDER BY idH DESC")->fetchAll();

        foreach($history AS $h){

            echo "<tr>";
            echo "<td>$h->idH</td>";
            echo "<td><strong>$h->ip</strong></td>";
            echo "<td>$h->agent</td>";
            echo "<td>$h->loged</td>";
            echo "<td>".date('d/m/Y à h:i',$h->date)."</td>";
            echo "<td><a href='action/delete.php?table=loginhistory&label=idH&id=$h->idH&r=history.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    // EDIT -------------------------------------------------------------------------

    static function getArticleById($id,$db){
        return $db->query("SELECT * FROM articles WHERE idA = ?",[$id])->fetch();
    }

    static function getPageById($id,$db){
        return $db->query("SELECT * FROM pages WHERE idP = ?",[$id])->fetch();
    }

    static function getCategorieById($id,$db){
        return $db->query("SELECT * FROM categories WHERE idC = ?",[$id])->fetch();
    }

    static function getMenuById($id,$db){
        return $db->query("SELECT * FROM menu WHERE idM = ?",[$id])->fetch();
    }

    static function getTagById($id,$db){
        return $db->query("SELECT * FROM tags WHERE idT = ?",[$id])->fetch();
    }

    static function getArticleImageById($id,$db){
        $img = $db->query("SELECT image FROM articles WHERE idA = ?",[$id])->fetch();

        if(!empty($img)){

            return $img->image;

        }else{

            return false;

        }
    }

    // Textes -------------------------------------------------------------------------

    static function getTextes($lng){

        $file = file_get_contents("langue/$lng/langue.json");

        $align = ($lng == 'FR') ? "" : "style='text-align: right'";

        foreach(json_decode($file) AS $key => $f){

            echo "texte : $key<br>";

            echo "<input type='text' name='$key' value=\"$f\" placeholder='Veuillez ne pas laisser ce champs vide' class='mb20' $align>";

        }

    }

    // PAGINATION -------------------------------------------------------------------------

    static function limit(){

        $limit = (isset($_GET['page'])) ? $_GET['page'] : 1;

        return (($limit - 1) * self::$result_per_page).','.self::$result_per_page;

    }

    static function paginationBtn($table,$id,$db){

        $page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;

        $nbr = $db->query("SELECT COUNT($id) AS nbr FROM $table")->fetch();

        $n = ceil($nbr->nbr / self::$result_per_page);

        if($n == 1) return false;

        if($page > 1) echo "<a class='pg-b' href='?page=1'><<</a>";
        if($page > 1) echo "<a class='pg-b' href='?page=".($page - 1)."'><</a>";

        for($i = 1; $i <= $n ; $i++){

            if($i == $page){
                echo "<a href='?page=$i' class='btn b-b'>$i</a>";
            }else{
                echo "<a href='?page=$i'>$i</a>";
            }

        }

        if($page < $n) echo "<a class='pg-b' href='?page=".($page + 1)."'>></a>";
        if($page < $n) echo "<a class='pg-b' href='?page=$n'>>></a>";

    }

}
