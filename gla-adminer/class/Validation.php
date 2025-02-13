<?php
class Validation {

    static function alphaNum($ch){
        //if (preg_match("/^[0-9a-zA-Z\'-_êéèêàçâ ]+$/", $ch)) return true;
        return true;
    }

    static function between($ch, $min, $max){
        if(strlen($ch) < $min || strlen($ch > $max)) return true;
    }

    static function numBetween($ch, $min, $max){
        if($ch < $min || $ch > $max) return true;
    }

    static function toUrl($ch){

        $url = strtolower(preg_replace('#[^a-zA-Z0-9]#i', '-', trim($ch)));

        $url = preg_replace('<(-)\\1+(?!\\1)>', '', $url);

        return $url;

    }

    static function isUnique($element,$feild,$table,$db){

        $isset = $db->query("SELECT COUNT(*) AS n FROM $table WHERE $feild = ?",[$element])->fetch();

        if(empty($isset->n)) return true;

    }

    static function isUniqueNotMinde($element, $feild, $table, $myId, $db){

        $isset = $db->query("SELECT COUNT(*) AS n FROM $table WHERE ($feild = ? AND idU != ?)",[$element, $myId])->fetch();

        if(empty($isset->n)) return true;

    }

}
