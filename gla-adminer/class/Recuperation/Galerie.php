<?php

namespace Recuperation;


class Galerie {

    static function getImages($type,$db){

        $image = $db->query("SELECT * FROM image WHERE typeI = ? ORDER BY idI DESC",[$type])->fetchAll();

        foreach($image AS $i){

            $size = ($i->sizeI < 250000 ) ? ceil($i->sizeI / 1024) ." Ko" : ceil($i->sizeI / 1024) ." Ko, <p class='red'>Attention, Image et trop volumineuse, Elle pourrait ralentire le chargement des pages.</p>";

            echo "<div class='img' id='img-$i->idI'>";

            echo "<img src='".WEBROOT."theme/assets/img/large/$i->nameI'/>";
            echo "<span>Nom : $i->nameI</span>";
            echo "<span>Espace : $size</span>";
            echo "<span>Résolution : $i->widthI x $i->heightI Px</span>";

            echo "<div class='opt'>";

            echo "<input type='file' name='imageedit-$i->idI' id='imgFileEdit-$i->idI' class='imgFile' onchange='galerieEditPics(this,$i->idI)'/>";
            echo "<span class='btn b-g' onclick=\"Q('#imgFileEdit-$i->idI').click()\">Modifier</span>";

            echo "</div>";

            echo "</div>";

        }

    }

    static function imageById($id,$db){

        return $db->query("SELECT nameI FROM image WHERE idI = ?",[$id])->fetch();

    }

} 