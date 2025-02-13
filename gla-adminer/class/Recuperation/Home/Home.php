<?php
namespace Recuperation\Home;


use Root\Textes;

class Home {

    private $url;
    private $page;
    private $textes;
    private $langue;
    private $db;

    public function __construct($url, $db){

        $this->url = $url;
        $this->textes = [];
        $this->langue = "";
        $this->db = $db;

    }

    private function staticFile(){

        echo "<link rel='stylesheet' href='". \Func::cache('gla-adminer/assets/css/gla-home-style.css') ."'/>";
        echo "<script src='". \Func::cache('gla-adminer/assets/js/gla-home.js') ."'></script>";

    }

    private function textes(){

        echo "<table>";

        echo "<tr>";

        echo "<th class='w20'>Id</th>";
        echo "<th>Text</th>";
        echo "<th class='w20'>Action</th>";

        echo "</tr>";

        foreach($this->textes AS $text){

            $table = ($this->langue == '') ? "texte" : "textear";

            echo "<tr class='texte'>";

            echo "<td>".$text['id']."</td>";
            echo "<td><textarea id='$table-".$text['id']."'>".$text['text']."</textarea></td>";
            echo "<td><span class='gla-btn' onclick='save(".$text['id'].", \"$table\", this)'><span class='ic'>W</span></span></td>";

            echo "</tr>";

        }

        echo "</table>";

    }

    private function glaHome(){

        ?>

        <div class="gla-home">

            <a href="<?= WEBROOT ?>gla-adminer/" target="_blank" title="Administration"><img src="<?= \Func::cache('gla-adminer/assets/image/favicon-globalads.png') ?>"/></a>
            <a href="<?= WEBROOT ?>gla-adminer/site.php" target="_blank" title="Informations du site"><span class="ic">&</span></a>
            <a href="<?= WEBROOT ?>gla-adminer/galerie.php" target="_blank" title="Images"><span class="ic">p</span></a>

            <div class="sep"></div>

            <span onclick="Q('.gla-mask').classList.toggle('visible')"><span class="ic" title="Textes">ó</span><span class="nbr"><?= count($this->textes) ?></span></span>

        </div>

    <?php

    }

    private function glaMask(){

        ?>

        <div class="gla-mask">

            <div class="gla-popup">

                <div class="gla-head">

                    <h1>Modifier les textes de cette page</h1>

                </div>

                <div class="gla-cont">

                    <?= $this->textes() ?>

                </div>

            </div>

        </div>

        <?php

    }

    public function run(){

        $this->staticFile();

        $this->glaHome();

        $this->glaMask();

    }

    public function putText($textes, $langue){

        $this->textes = $textes;
        $this->langue = $langue;

    }

} 