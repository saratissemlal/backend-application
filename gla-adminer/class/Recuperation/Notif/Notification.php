<?php
namespace Recuperation\Notif;

class Notification {

    private $db;
    private $articles = [];
    private $escape = [" un "," une "," des "," les "," ces "," ses "," a "," à "," et "," est "," es "," c'est "," ça "," pour "," sur "," avec "," dans "," ou "," au "," aux "," du "," de "," je "," tu "," il "," elle "," nous "," vous "," ils "," elles "," va "," te "," me "," tout "," tous"," toute "," toutes "," suis "," bon "," bonne "," très "," trop ","  "];

    public function __construct($db){

        $this->db = $db;

    }

    public function scanArticles(){

        $articles = Articles::getAllArticles($this->db);

        foreach($articles AS $a){

            $this->articles[$a->idA]['erreurs'] = 0;

            $this->title($a->title,$a->idA);

            $this->description($a->title,substr($a->content,0,230),$a->idA);

            $this->content($a->title,$a->content,$a->idA);

        }

        $this->showNotif();

    }

    public function scanArticlesById($id){

        $a = Articles::articleById($id,$this->db);

        $this->articles[$a->idA]['erreurs'] = 0;

        $this->title($a->title,$a->idA);

        $this->description($a->title,substr($a->content,0,230),$a->idA);

        $this->content($a->title,$a->content,$a->idA);

        $this->showNotif();

    }

    public function showNotif(){

        foreach($this->articles AS $key => $article){

            if($article['erreurs'] > 0 ){

                $a = Articles::articleById($key,$this->db);

                echo "<div class='box'>";

                echo "<h4><span class='icon red'>c</span> <span class='red'>(".$article['erreurs']." erreurs).</span> $a->title, <a href='".WEBROOT."gla-adminer/action/edit/article.php?id=$a->idA'>Corriger</a></h4>";

                echo "<ul>";

                if(!empty($article['title'])) $this->showInfo($article['title'],'Titre');

                if(!empty($article['description'])) $this->showInfo($article['description'],'Description');

                if(!empty($article['content'])) $this->showInfo($article['content'],'Contenu');


                echo "</ul>";

                echo "</div>";

            }

        }

    }

    private function showInfo($info,$title){

        if(!empty($info)){

            echo "<fieldset>";

            echo "<legend>$title</legend>";

            foreach($info AS $key => $i){

                echo "<li><span class='icon red'>Y</span> $i</li>";

            }

            echo "</fieldset>";

        }

    }

    private function title($title,$id){

        $this->min($title,$id,'Titre trop court','title',35);

        $this->max($title,$id,'Titre trop Long','title',90);

        $this->words($title,$id,'title',90);


    }

    public function description($title,$desc,$id){

        $this->min($desc,$id,'description trop courte','description',230);

        $this->titleInContent($title,$desc,$id,'description','la description');

    }

    public function content($title,$content,$id){

        $this->min($content,$id,'Contenu trop court','content',900);

        $this->titleInContent($title,$content,$id,'content',"le contenu de l'article");

    }



    private function words($title,$id,$value){

        $words = str_word_count($this->escape($title));

        if($words > 12){

            $this->articles[$id][$value]['words'] = 'Trop de mots';

            $this->articles[$id]['erreurs']++;

        }

        if($words < 3){

            $this->articles[$id][$value]['words'] = 'Utilisez plus de mots';

            $this->articles[$id]['erreurs']++;

        }

    }

    private function max($title,$id,$msg,$value,$min){

        if(strlen($title) > $min){

            $this->articles[$id][$value]['char'] = $msg;

            $this->articles[$id]['erreurs']++;

        }

    }

    private function min($title,$id,$msg,$value,$min){

        if(strlen($title) < $min){

            $this->articles[$id][$value]['char'] = $msg;

            $this->articles[$id]['erreurs']++;

        }

    }

    private function titleInContent($title,$desc,$id,$tab,$msg){

        $title = $this->escape($title);

        $desc = $this->escape($desc);

        $titleWords = explode(' ', $title);

        $occur = 0;

        foreach($titleWords AS $t){

            if(stripos($desc,$t))  $occur = $occur + 1;

        }

        if($occur < 2){

            $this->articles[$id][$tab]['occur'] = "Les mots clé du titre ne se sont pas bien utiliser dans $msg";

            $this->articles[$id]['erreurs']++;

        }

        if($occur > 14){

            $this->articles[$id][$tab]['occur'] = "Les mots clé du titre sont trop répété dans $msg";

            $this->articles[$id]['erreurs']++;

        }

    }

    private function escape($char){

        return trim(str_ireplace($this->escape, " ", " $char "));

    }

} 