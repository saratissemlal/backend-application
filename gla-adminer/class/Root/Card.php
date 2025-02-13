<?php
/**
 * Created by PhpStorm.
 * User: Khaled
 * Date: 29/09/2019
 * Time: 11:36
 */

namespace Root;


class Card {

    static function getCard($db, $limit = 1){

        $cards = $db->query("SELECT url, image FROM cards ORDER BY RAND() LIMIT $limit")->fetchAll();

        foreach ($cards as $c) {

            echo "<a href='$c->url' class='card'>";
            echo "<img src='". WEBROOT ."gla-adminer/uploads/article/small/$c->image'/>";
            echo "</a>";

        }


    }

} 