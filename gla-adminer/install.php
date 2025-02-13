<?php

if(isset($_POST['install'])) {

    extract($_POST);

    if(empty($_GET['install'])){

        try {
            $conn = new PDO("mysql:host=$s_host", $s_username, $s_password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = strip_tags("CREATE DATABASE $s_database");

            $conn->exec($sql);

            $file = <<< EOT
<?php

class Config {

    static \$config = [

        // Site Name
        "site_name" => " - {$s_sitetitle}",

        // URLs
        "url" => "{$s_domaine}",
        "folder" => "",

        "assets" => "{$s_domaine}theme/assets/",

        // Data Base Informations
        "login" => "{$s_username}",
        "password" => "{$s_password}",
        "host" => "{$s_host}",
        "db_name" => "{$s_database}",

        //image crop
        "img_thumb" => 350,
        "img_full" => 800

    ];

    static function get(\$c){

        return self::\$config[\$c];

    }

}
EOT;

            file_put_contents("class/Config.php", $file);

            header('Location:?install=site_install');

        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }

    }

    if(!empty($_GET['install'])){

        session_start();

        require 'core/Autoload.php';
        Autoload::register('load');

        $db = BDD\App::getBDD();

        $db->query("CREATE TABLE `articles` (
                          `idA` int(11) NOT NULL,
                          `title` varchar(256) NOT NULL,
                          `url` varchar(256) NOT NULL,
                          `categorie` int(11) NOT NULL,
                          `image` varchar(36) NOT NULL,
                          `content` text NOT NULL,
                          `date` varchar(16) NOT NULL,
                          `idB` int(11) NOT NULL,
                          `n_see` int(11) NOT NULL DEFAULT '0',
                          `showc` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `categories` (
                          `idC` int(11) NOT NULL,
                          `name` varchar(64) NOT NULL,
                          `url` varchar(64) NOT NULL,
                          `parent` int(11) NOT NULL,
                          `description` text NOT NULL,
                          `date` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `comment` (
                          `idC` int(11) NOT NULL,
                          `idA` int(11) NOT NULL,
                          `name` varchar(128) NOT NULL,
                          `mail` varchar(128) NOT NULL,
                          `comment` text NOT NULL,
                          `date` int(11) NOT NULL,
                          `statu` int(11) NOT NULL DEFAULT '0'
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `commentsmessages` (
                          `n_cmpl` varchar(512) NOT NULL,
                          `c_vrf` varchar(512) NOT NULL,
                          `c_p` varchar(512) NOT NULL,
                          `c_er` varchar(512) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("INSERT INTO `commentsmessages` (`n_cmpl`, `c_vrf`, `c_p`, `c_er`) VALUES
                                ('Veuillez entrer votre nom votre email et votre commentaire', 'Veuillez vÃ©rifier le numÃ©ro que vous avez entrÃ©', 'Vous venez de commenter cet article, Il faut qu\'un modÃ©rateur du site valide ce commentaires pour qu\'il saffiche, Merci pour votre commentaire.', 'Une erreur est servenu.');
        ");


        $db->query("CREATE TABLE `contact` (
                          `idC` int(11) NOT NULL,
                          `name` varchar(256) NOT NULL,
                          `email` varchar(256) NOT NULL,
                          `numero` varchar(128) NOT NULL,
                          `message` text NOT NULL,
                          `date` text NOT NULL,
                          `statu` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `image` (
                          `idI` int(11) NOT NULL,
                          `prI` int(11) NOT NULL DEFAULT '0',
                          `nameI` varchar(256) NOT NULL,
                          `typeI` varchar(16) NOT NULL,
                          `sizeI` int(11) NOT NULL,
                          `widthI` int(11) NOT NULL,
                          `heightI` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `loginhistory` (
                          `idH` int(11) NOT NULL,
                          `ip` varchar(32) NOT NULL,
                          `agent` varchar(512) NOT NULL,
                          `loged` varchar(16) NOT NULL,
                          `date` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `menu` (
                          `idM` int(11) NOT NULL,
                          `name` varchar(64) NOT NULL,
                          `url` varchar(64) NOT NULL,
                          `place` int(11) NOT NULL,
                          `parent` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("INSERT INTO `menu` (`idM`, `name`, `url`, `place`, `parent`) VALUES (1, 'Accueil', '', 1, 0)");

        $db->query("CREATE TABLE `pages` (
                          `idP` int(11) NOT NULL,
                          `name` varchar(64) NOT NULL,
                          `url` varchar(64) NOT NULL,
                          `content` text NOT NULL,
                          `date` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("INSERT INTO `pages` (`idP`, `name`, `url`, `content`, `date`) VALUES
                                (1, 'A Propos', 'a-propos', '<p>Toutes les informatisons &agrave; savoir sur note entreprise</p>', 1522839098),
                                (2, 'Contact', 'contact', 'Contactez nous', 1522839128)
          ");

        $db->query("CREATE TABLE `parametres` (
                          `imgfull` int(11) NOT NULL,
                          `imgsmall` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("INSERT INTO `parametres` (`imgfull`, `imgsmall`) VALUES (800, 300)");

        $db->query("CREATE TABLE `remember` (
                          `id` int(11) NOT NULL,
                          `sel` varchar(20) NOT NULL,
                          `tok` varchar(64) NOT NULL,
                          `user` varchar(32) NOT NULL,
                          `ex` datetime NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `site` (
                          `name` varchar(64) NOT NULL,
                          `title` varchar(256) NOT NULL,
                          `description` text NOT NULL,
                          `tele` varchar(64) NOT NULL,
                          `email` varchar(64) NOT NULL,
                          `adresse` varchar(256) NOT NULL,
                          `pagefacebook` varchar(512) NOT NULL,
                          `pagetwitter` varchar(512) NOT NULL,
                          `pagegoogle` varchar(512) NOT NULL,
                          `integercode` varchar(512) NOT NULL,
                          `metatags` text NOT NULL,
                          `analytics` text NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("INSERT INTO `site` (`name`, `title`, `description`, `tele`, `email`, `adresse`, `pagefacebook`, `pagetwitter`, `pagegoogle`, `integercode`, `metatags`, `analytics`) VALUES
                                ('{$_POST['site_name']}', 'Site title', 'Site description', '0000 00 00 00', 'contact@exemple.com', 'Adresse ...', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://plus.google.com/', '', '', '')

          ");

        $db->query("CREATE TABLE `tag` (
                          `idTag` int(11) NOT NULL,
                          `t` int(11) NOT NULL,
                          `a` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `tags` (
                          `idT` int(11) NOT NULL,
                          `tag` varchar(64) NOT NULL,
                          `u` varchar(64) NOT NULL,
                          `description` text NOT NULL,
                          `date` int(11) NOT NULL,
                          `see` int(11) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `texte` (
                          `id` int(11) NOT NULL,
                          `texte` text NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `theme` (
                          `b_back` varchar(256) NOT NULL,
                          `b_c` varchar(32) NOT NULL,
                          `h_back` varchar(32) NOT NULL,
                          `f_back` varchar(32) NOT NULL,
                          `n_back` varchar(32) NOT NULL,
                          `n_c` varchar(32) NOT NULL,
                          `h_c` varchar(32) NOT NULL,
                          `f_c` varchar(32) NOT NULL,
                          `a_c` varchar(32) NOT NULL,
                          `br` int(11) NOT NULL,
                          `bt_back` varchar(16) NOT NULL,
                          `bt_c` varchar(16) NOT NULL,
                          `sb_p` varchar(32) NOT NULL,
                          `c_form` varchar(4) NOT NULL,
                          `c_nbr` int(11) NOT NULL,
                          `c_wt` int(11) NOT NULL,
                          `sb_w` int(11) NOT NULL,
                          `a_style` varchar(6) NOT NULL,
                          `a_w` int(11) NOT NULL,
                          `a_pp` int(11) NOT NULL,
                          `sl_sp` int(11) NOT NULL,
                          `d_frm` varchar(16) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("CREATE TABLE `user` (
                          `id` int(11) NOT NULL,
                          `pseudo` varchar(64) NOT NULL,
                          `name` varchar(64) NOT NULL,
                          `password` varchar(64) NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
          ");

        $db->query("INSERT INTO `user` (`id`, `pseudo`, `name`, `password`) VALUES
                                (1, '{$_POST['user_name']}', '{$_POST['site_name']}', '".strip_tags('$2y$10$dk/RGFScdd1R5xfzoHgYNOkx9BeLcfoq.Lp1NChKFQBwj6d7gFd6e')."')
          ");

        $db->query("ALTER TABLE `articles` ADD PRIMARY KEY (`idA`)");

        $db->query("ALTER TABLE `categories` ADD PRIMARY KEY (`idC`)");

        $db->query("ALTER TABLE `comment` ADD PRIMARY KEY (`idC`)");

        $db->query("ALTER TABLE `contact`ADD PRIMARY KEY (`idC`)");

        $db->query("ALTER TABLE `image` ADD PRIMARY KEY (`idI`)");

        $db->query("ALTER TABLE `loginhistory` ADD PRIMARY KEY (`idH`)");

        $db->query("ALTER TABLE `menu` ADD PRIMARY KEY (`idM`)");

        $db->query("ALTER TABLE `pages` ADD PRIMARY KEY (`idP`)");

        $db->query("ALTER TABLE `remember` ADD PRIMARY KEY (`id`)");

        $db->query("ALTER TABLE `tag` ADD PRIMARY KEY (`idTag`)");

        $db->query("ALTER TABLE `tags` ADD PRIMARY KEY (`idT`)");

        $db->query("ALTER TABLE `texte` ADD PRIMARY KEY (`id`)");

        $db->query("ALTER TABLE `user` ADD PRIMARY KEY (`id`)");


        $db->query("ALTER TABLE `articles` MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `categories` MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `comment` MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `contact` MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `image` MODIFY `idI` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `loginhistory` MODIFY `idH` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `menu` MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `pages` MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `remember` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `tag` MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `tags` MODIFY `idT` int(11) NOT NULL AUTO_INCREMENT");
        $db->query("ALTER TABLE `texte` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

        $db->query(trim($_POST['texts']));

        $db->query("INSERT INTO `theme` (`b_back`, `b_c`, `h_back`, `f_back`, `n_back`, `n_c`, `h_c`, `f_c`, `a_c`, `br`, `bt_back`, `bt_c`, `sb_p`, `c_form`, `c_nbr`, `c_wt`, `sb_w`, `a_style`, `a_w`, `a_pp`, `sl_sp`, `d_frm`) VALUES
                                ('#ffffff', '#212121', '#000000', '#004080', '#000000', '#ffffff', '#ffffff', '#ffffff', '#004080', 3, '#004080', '#ffffff', 'row', 'gla', 12, 550, 25, 'box', 24, 8, 4, 'd - m - Y');
        ");

        //$db->query(trim($_POST['theme']));

        $db->query(trim($_POST['image']));

        die('DB installée');

    }

}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Installation de la base de données</title>
</head>
<body>

<style>

    .box{font-family:fantasy;width: 60%;padding: 40px;background: rgba(0,0,0,0.04);margin: 100px auto;color: #333;}
    .box div{display: flex;justify-content: space-between;align-items: center;margin-bottom: 20px;}
    .box input, textarea{font-family:fantasy;width: 70%;padding: 8px 12px;border-radius: 6px;border: 1px solid rgba(0,0,0,0.1)}
    .box input[type=submit]{width: auto;cursor: pointer;background: rgba(0,0,248,0.7);color: #fff;border: none}

</style>

<div class="box">

    <h1>Installation de la base de données</h1>

    <form action="" method="POST">

        <?php if(empty($_GET['install'])) : ?>

        <h2>Etape 1 (Informations du serveur)</h2>

        <div>

            <label>Titre du site</label>
            <input type="text" name="s_sitetitle" placeholder="Nom du site ..." required="true"/>

        </div>

        <div>

            <label>Nom de domaine</label>
            <input type="text" name="s_domaine" placeholder="Nom de domaine ..." value="https://<?= $_SERVER['SERVER_NAME'] ?>" required="true"/>

        </div>

        <div>

            <label>Host</label>
            <input type="text" name="s_host" placeholder="Host ..." value="localhost" required="true"/>

        </div>

        <div>

            <label>Username</label>
            <input type="text" name="s_username" placeholder="Nom d'utilisateur ..." required="true"/>

        </div>

        <div>

            <label>Mot de passe (MySQL)</label>
            <input type="text" name="s_password" placeholder="Mot de passe MySQL ..." required="true"/>

        </div>

        <div>

            <label>Base de données</label>
            <input type="text" name="s_database" placeholder="Base de données ..." value="gla-adminer" required="true"/>

        </div>

        <input type="submit" name="install" value="Suivant"/>

        <?php endif; ?>

        <?php if(!empty($_GET['install'])) : ?>

        <h2>Etape 2 (Informations du site)</h2>

        <div>

            <label>User name (Login)</label>
            <input type="text" name="user_name" placeholder="Login ..." required="true"/>

        </div>

        <div>

            <label>Site name</label>
            <input type="text" name="site_name" placeholder="Nom du site ..." required="true"/>

        </div>

        <div>

            <label>Textes</label>
            <textarea name="texts" placeholder="Requette d'insertion des textes ..." required="true"></textarea>

        </div>

        <div>

            <label>Theme</label>
            <textarea name="theme" placeholder="Requette d'insertion du theme ..." required="true"></textarea>

        </div>

        <div>

            <label>Image</label>
            <textarea name="image" placeholder="Requette d'insertion des images ..." required="true"></textarea>

        </div>

        <input type="submit" name="install" value="Installer"/>

        <?php endif ?>

    </form>

</div>

</body>
</html>