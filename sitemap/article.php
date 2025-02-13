<?php require('../gla-adminer/core/coreAdmin.php');

$site = new \Recuperation\sitemap('article',$db);

$site->getSitemap();