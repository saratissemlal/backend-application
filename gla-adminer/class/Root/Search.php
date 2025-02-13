<?php

namespace Root;

class Search {

    static function articles($get,$limit,$db){

        return $db->query("SELECT * FROM articles WHERE (title LIKE :key OR content LIKE :key) ORDER BY idA DESC LIMIT $limit",["key" => "%$get%"])->fetchAll();

    }

} 