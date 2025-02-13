<html>

<head>
    <meta charset="UTF-8">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="<?= Func::cache('gla-adminer/assets/css/gla-style.css') ?>" />
    <link rel="icon" href="<?= Func::cache('gla-adminer/assets/image/favicon-globalads.png') ?>">
</head>

<body>

    <div class="gla-menu" id="gla-menu">
        <div class="head">
            <img src="<?= Func::cache('gla-adminer/assets/image/gla-logo.png') ?>" alt="Global Ads Administration" />
        </div>

        <div class="foot">
            <a href="<?= WEBROOT ?>gla-adminer/index.php" title="Accueil"><span class="icon">ï</span></a>
            <a href="<?= WEBROOT ?>gla-adminer/parametres.php" title="Paramètres"><span class="icon">@</span></a>
            <a href="<?= WEBROOT ?>gla-adminer/notifs.php" title="Notifications - Articles SEO"><span class="icon">=</span></a>
            <a href="<?= WEBROOT ?>gla-adminer/control/logout.php" title="Déconnexion"><span class="icon">X</span></a>
        </div>

        <span class="ul">APPS</span>

        <ul class="menu">
            <a href="<?= WEBROOT ?>gla-adminer/orders.php">
                <li><span class="icon">I</span> Commandes</li>
            </a>
            <!--<a href="<?= WEBROOT ?>gla-adminer/utilisateurs.php"><li><span class="icon">+</span> Membres</li></a>
        <a href="<?= WEBROOT ?>gla-adminer/demandes_de_service.php"><li><span class="icon">%</span> Demandes de service</li></a>
        <a href="<?= WEBROOT ?>gla-adminer/commentaires.php"><li><span class="icon">:</span> Commentaires</li></a> -->
            <a href="<?= WEBROOT ?>gla-adminer/contact.php">
                <li><span class="icon">%</span> Messages</li>
            </a>
        </ul>

        <span class="ul">Eléments</span>

        <ul class="menu">
            <a href="<?= WEBROOT ?>gla-adminer/articles.php">
                <li><span class="icon">k</span> Produits</li>
            </a>
            <a href="<?= WEBROOT ?>gla-adminer/pages.php">
                <li><span class="icon">n</span> Pages</li>
            </a>
            <a href="<?= WEBROOT ?>gla-adminer/menu.php">
                <li><span class="icon">i</span> Menu</li>
            </a>
            <a href="<?= WEBROOT ?>gla-adminer/categories.php">
                <li><span class="icon">#</span> Catégories</li>
            </a>
        </ul>

        <span class="ul">Thème</span>

        <ul class="menu">
            <a href="<?= WEBROOT ?>gla-adminer/theme.php" title="Theme du site">
                <li><span class="icon">F</span> Couleurs</li>
            </a>
            <a href="<?= WEBROOT ?>gla-adminer/galerie.php" title="Les images du site"><span class="icon">p</span>galerie</a>
            <a href="<?= WEBROOT ?>gla-adminer/textes.php" title="Les textes du site"><span class="icon">ó</span>Textes</a>
            <a href="<?= WEBROOT ?>gla-adminer/site.php" title="Informations sur le site"><span class="icon">&</span>Infos Générales</a>
        </ul>

        <div class="foot btm">
            <a href="https://www.globalads.dz" title="A Propos de Global Ads" target="_blank">&copy; GLOBAL ADS</a>
        </div>
    </div>

    <div class="gla-content">