<?php require('../gla-adminer/core/coreAdmin.php');

$site = new \Recuperation\sitemap('page',$db);

$site->getSitemap();