<?php

namespace Root;

class GLA{

    static $langue;

    static function exp($e){

        $e = trim($e, '/');

        $explode =  explode('/', $e);

        return self::setLanguage($explode);

    }

    static function setLanguage($explode){

        $langues = ['ar', 'fr'];

        if (in_array($explode[0], $langues)) {

            self::$langue = $explode[0] . '/';

            array_shift($explode);

            if (empty($explode)) {

                return $explode = [''];

            }

            return $explode;

        } else {

            self::$langue = '';

            return $explode;

        }
    }

    static function pageExist($p, $db){

        $page = $db->query("SELECT idP FROM pages WHERE url = ?", [$p])->fetch();

        if (!empty($page) && file_exists("theme/page/$p.php")) return true;

    }

    static function catExist($p, $db){

        $cat = $db->query("SELECT idC FROM categories WHERE url = ?", [$p])->fetch();

        if (!empty($cat) && file_exists("theme/categorie/$p.php")) return true;

    }
}
