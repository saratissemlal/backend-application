<?php
namespace Recuperation\Notif;


class Articles {

    static function getAllArticles($db){

        return $db->query("SELECT idA,title,content,date FROM articles ORDER BY idA DESC")->fetchAll();

    }

    static function articleById($id,$db){

        return $db->query("SELECT idA,title,content,date FROM articles WHERE idA = ?",[$id])->fetch();

    }



} 