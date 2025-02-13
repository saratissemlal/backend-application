<?php

class Mail
{

    static function passwordRecup($mail, $link)
    {

        $sujet = \Config::get('site_title') . " - Rénitialiser mon mot de passe";

        ob_start();

?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title><?= \Config::get('site_title') ?></title>
        </head>

        <body>

            <h1><?= \Config::get('site_title') ?> - Récupération de mot de passe.</h1>

            <p>Ce ci est un email de <a href="<?= \Config::get('url') ?>"><?= \Config::get('site_title') ?></a>.</p>

            <p>Pour réinitialier votre mot de passe veuillez cliquer sur le lien suivant</p>

            <a href="<?= $link ?>">Réinitialier Mon mot de passe</a>

        </body>

        </html>

    <?php

        $content = ob_get_clean();

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $headers .= "From: " . \Config::get('site_title') . " <" . \Config::get('site_email') . ">" . "\r\n";
        $headers .= "Reply-To: " . \Config::get('site_email') . "\r\n";
        header_remove();

        mail($mail, $sujet, $content, $headers);
    }

    static function welcom_email_validation($mail, $name, $code)
    {

        $link = WEBROOT . "page/signin-login?email=$mail&token=$code";

        $sujet = \Config::get('site_title') . " - Bienvenu";

        ob_start();

    ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title><?= \Config::get('site_title') ?></title>
        </head>

        <body>

            <h1><?= $name ?>, bienvenu sur <?= \Config::get('site_title') ?>.</h1>

            <p>Ce ci est un email vous informant que votre inscription sur <a href="<?= \Config::get('url') ?>"><?= \Config::get('site_title') ?></a> s'est bien déroulée.</p>

            <p>Pour valider votre adresse email veuillez cliquer sur le lien suivant</p>

            <a href="<?= $link ?>">Valider mon adresse email</a>

        </body>

        </html>

    <?php

        $content = ob_get_clean();

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $headers .= "From: " . \Config::get('site_title') . " <" . \Config::get('site_email') . ">" . "\r\n";
        $headers .= "Reply-To: " . \Config::get('site_email') . "\r\n";
        header_remove();

        mail($mail, $sujet, $content, $headers);
    }

    static function envoyerPanier(){

        ob_start();

    ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title><?= \Config::get('site_title') ?></title>
        </head>

        <body>

            <h1>Nouvelle commande</h1>

            <p>Ce ci est un email de <a href="<?= \Config::get('url') ?>"><?= \Config::get('site_title') ?></a>.</p>

            <p>Vous avez reçu une nouvelle commande sur <?= \Config::get('site_title') ?> aujourd'hui à <?= date("H:i", time()) ?></p>

            <a href="<?= \Config::get('url') ?>gla-adminer/">Voir la commande</a>

        </body>

        </html>

<?php

        $content = ob_get_clean();

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $headers .= "From: " . \Config::get('site_title') . " <" . \Config::get('site_email') . ">" . "\r\n";
        $headers .= "Reply-To: " . \Config::get('site_email') . "\r\n";
        header_remove();

        mail(\Config::get('site_email'), \Config::get('site_title') . " - Nouvelle commande", $content, $headers);
    }
}
