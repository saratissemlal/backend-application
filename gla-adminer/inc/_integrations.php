<nav class="box">

    <a href="<?= WEBROOT ?>/gla-adminer/site.php"><span class="icon">&</span> informations du site</a>
    <a href="<?= WEBROOT ?>/gla-adminer/integrations.php"><span class="icon">/</span> Intégrations</a>

</nav>

<div class="box">
    <h1 class="mb20">Intégrations de code</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
    <div class="left">

        <h2 class="mb20">Meta tags</h2>

        <div class="mb10">
            <label>Google webmaster tools, noindex, nofollow ...</label>
            <textarea class="teh200" name="metatags" placeholder="Votre code ici"><?= $site->metatags ?></textarea>
        </div>

    </div>

    <div class="right">

        <h2 class="mb20">Code d'analytics</h2>

        <div class="mb10">
            <label>Google analytics, code de suivi ...</label>
            <textarea class="teh200" name="analytics" placeholder="Votre code ici"><?= $site->analytics ?></textarea>
        </div>

        <div>
            <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
        </div>
    </div>
    </form>
    <div class="clear"></div>

    <p class="rem"><span class="icon">_</span> Si vous voulez insérer plusieurs codes vous devez aller à la ligne</p>
</div>
