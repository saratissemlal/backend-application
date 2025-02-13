<?php
namespace Recuperation;


class Textes {

    static function Textes($table, $db){

        $textes = $db->query("SELECT * FROM $table ORDER BY id DESC")->fetchAll();

        foreach($textes AS $text){

            echo "<tr class='texte'>";

            echo "<td>$text->id</td>";
            echo "<td><textarea id='$table-$text->id'>$text->texte</textarea></td>";
            echo "<td><span class='btn b-b' onclick='save($text->id, \"$table\", this)'><span class='icon'>W</span> Modifier</span></td>";

            echo "</tr>";

        }

    }

} 