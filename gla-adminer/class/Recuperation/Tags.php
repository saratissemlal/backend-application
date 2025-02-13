<?php
namespace Recuperation;


class Tags {

    static function tags($db,$limit){

        $tags = $db->query("SELECT idT,tag,description,date FROM tags LIMIT $limit")->fetchAll();

        foreach($tags AS $t){

            echo "<tr>";
            echo "<td>$t->idT</td>";
            echo "<td>$t->tag</td>";
            echo "<td>".substr($t->description,0,64)."...</td>";
            echo "<td>".date('d/m/Y à h',$t->date)."h</td>";
            echo "<td><a href='action/edit/tag.php?id=$t->idT' class='btn b-g'><span class='icon'>&</span> Modifier</a> <a href='action/delete.php?table=tags&label=idT&id=$t->idT&r=tags.php' class='btn b-r'><span class='icon'>[</span> Supprimer</a></td>";
            echo "</tr>";

        }

    }

    static function addTag($post,$db){

        if(!empty($post['tag']) && !empty($post['description'])){

            $url = \Validation::toUrl($_POST['tag']);

            $db->query("INSERT INTO tags (tag,u,description,date,see) VALUES (?,?,?,?,0)",[$_POST['tag'],$url,$_POST['description'], time()]);

            \Func::setFlash('success',"Tag ajouté avec succes");

            \Func::execute(WEBROOT."sitemap/tag.php");

            \Func::redirect('../tags.php');

        }else{

            \Func::setFlash('error','Le tag et la description sont obligatoirs');

        }

    }

    static function tagList($db,$modele = false){

        $tags = $db->query("SELECT idT,tag FROM tags")->fetchAll();

        if(!$modele){

            foreach($tags AS $t){

                echo "<div class='tag'>";
                echo "<input type='checkbox' name='tag[]' id='tag-$t->idT' value='$t->idT'><label for='tag-$t->idT'>$t->tag</label>";
                echo "</div>";

            }

        }else{

            foreach($tags AS $t){

                $checked = $db->query("SELECT idTag FROM tag WHERE t = ? AND a = ?",[$t->idT,$modele])->fetch();

                $ch = (empty($checked->idTag)) ? '' : 'checked';

                echo "<div class='tag'>";
                echo "<input type='checkbox' name='tag[]' id='tag-$t->idT' value='$t->idT' $ch><label for='tag-$t->idT'>$t->tag</label>";
                echo "</div>";

            }

        }

    }

} 