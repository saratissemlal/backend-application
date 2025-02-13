<?php

namespace Recuperation;


class Slider {

    static function getImages($db){

        $image = $db->query("SELECT * FROM image WHERE typeI = ? ORDER BY idI DESC",['slider'])->fetchAll();

        foreach($image AS $i){

            echo "<div class='img' id='img-$i->idI'>";

            echo "<img src='".WEBROOT."theme/assets/img/slider/$i->nameI'/>";

            echo "<span>Résolution : $i->widthI x $i->heightI Px</span>";

            echo "<div class='opt'>";

            echo "<input type='file' name='imageedit-$i->idI' id='imgFileEdit-$i->idI' class='imgFile' onchange='sliderEditPics(this,$i->idI)'/>";
            echo "<a href='".WEBROOT."gla-adminer/action/deleteImg.php?id=$i->idI&r=slider.php&name=$i->nameI&folder=slider' class='btn b-r'>Supprimer</a><span class='btn b-g' onclick=\"Q('#imgFileEdit-$i->idI').click()\">Modifier</span>";

            echo "</div>";

            echo "</div>";

        }

    }

    static function imageById($id,$db){

        return $db->query("SELECT nameI FROM image WHERE idI = ?",[$id])->fetch();

    }

} 