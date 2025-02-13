<?php require('../gla-adminer/core/coreAdmin.php');

$site = new \Recuperation\sitemap('tag',$db);

$site->getSitemap();