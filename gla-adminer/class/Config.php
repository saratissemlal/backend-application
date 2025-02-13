<?php

class Config
{

    static $config = [

        // Site
        "site_name" => " - Ebricodom",
        "site_title" => "Ebricodom",
        "site_email" => "contact@ebricodom.dz",

        // URLs
        "url" => "https://www.ebricodom.dz/",
        "folder" => "/ebricodom/",

        "assets" => "https://www.ebricodom.dz/theme/assets/",

        // Data Base Informations
        "login" => "ebricodom",
        "password" => "jS2{LIg5DDgvf",
        "host" => "localhost",
        "db_name" => "ebricodom",
    
        //image crop
        "img_thumb" => 500,
        "img_full" => 1000

    ];

    static function get($c)
    {

        return self::$config[$c];
    }
}
