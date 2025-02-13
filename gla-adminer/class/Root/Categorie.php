<?php
/**
 * Created by PhpStorm.
 * User: Khaled
 * Date: 17/03/2019
 * Time: 11:48
 */

namespace Root;


class Categorie {

    static function config($cat, $db){

        $cat = $db->query("SELECT idA, title, url, image, prix, remise FROM articles WHERE categorie = ? AND qtt > 0",[$cat])->fetchAll();

        foreach ($cat as $c) {

            if(!empty($c->prix)) {

                if(!empty($c->remise)){

                    $price =  number_format($c->remise,0,'',' ');
                    $p = $c->remise;

                }else{

                    $price =  number_format($c->prix,0,'',' ');
                    $p = $c->prix;

                }

                echo "<option value='$c->idA' data-prix='$p' data-url='$c->url' data-image='$c->image' data-title='$c->title'>". ucfirst($c->title) ." ($price DA)</option>";

            }

        }


    }

} 