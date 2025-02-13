<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion - GLOBAL ADS Administartion</title>
    <link rel="stylesheet" href="<?= Func::cache('gla-adminer/assets/css/login.css') ?>"/>
</head>
<body>


<div class="box">
    <img src="<?= Func::cache('gla-adminer/assets/image/globalads.png') ?>" alt="Global Ads Administration"/>

    <?= Func::getFlash() ?>

    <form action="" method="POST">

        <div>
            <input type="text" name="gla-login" placeholder="Votre login ..."/>
        </div>

        <div>
            <input type="password" name="gla-pass" placeholder="Votre mot de passe ..."/>
        </div>

        <div>
            <input type="checkbox" name="gla-rem"/> <p class="rem">Se souvenire de la connexion</p>
        </div>

        <input type="submit" name="submit" value="Connexion"/>

    </form>
</div>


</body>
</html>