<?php require('../gla-adminer/core/coreAdmin.php');

$site = new \Recuperation\sitemap('categorie',$db);

$site->getSitemap();