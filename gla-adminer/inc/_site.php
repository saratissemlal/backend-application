<nav class="box">

    <a href="<?= WEBROOT ?>/gla-adminer/site.php"><span class="icon">&</span> informations du site</a>
    <a href="<?= WEBROOT ?>/gla-adminer/integrations.php"><span class="icon">/</span> Intégrations</a>

</nav>

<div class="box">
    <h1 class="mb20">Mon Site</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <h2 class="mb20">Informations sur le site</h2>

            <div class="mb10">
                <label>Nom du site</label>
                <input type="text" name="nom" value="<?= $site->name ?>" placeholder="Le nom du site ..." spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Titre du site</label>
                <input type="text" name="title" value="<?= $site->title ?>" placeholder="Quelque mots sur le site" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Titre du site ARABE</label>
                <input type="text" name="titlear" value="<?= $site->titlear ?>" placeholder="Quelque mots sur le site en arabe" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Description</label>
                <textarea class="teh60" name="description" placeholder="La description du site"><?= $site->description ?></textarea>
            </div>

            <div class="mb10">
                <label>Description ARABE</label>
                <textarea class="teh60" name="descriptionar" placeholder="La description du site en arabe"><?= $site->descriptionar ?></textarea>
            </div>

            <h2 class="mb20">Contact</h2>

            <div class="mb10">
                <label>Numéro de téléphone</label>
                <input type="text" name="tele" value="<?= $site->tele ?>" placeholder="Numéro de téléphone" />
            </div>

            <div class="mb10">
                <label>Email</label>
                <input type="text" name="email" value="<?= $site->email ?>" placeholder="Email ..." />
            </div>

            <div class="mb10">
                <label>Adresse</label>
                <input type="text" name="adresse" value="<?= $site->adresse ?>" placeholder="Adresse ..." spellcheck="true" />
            </div>

        </div>

        <div class="right">

            <h2 class="mb20">Pages réseaux sociaux</h2>

            <div class="mb10">
                <label>Facebook</label>
                <input type="text" name="pagefacebook" placeholder="Le code d'intégration de la page facebook (512 caractères)..." value="<?= $site->pagefacebook ?>">
            </div>

            <div class="mb10">
                <label>Twitter</label>
                <input type="text" name="pagetwitter" placeholder="Le code d'intégration de la page twitter (512 caractères)..." value="<?= $site->pagetwitter ?>" />
            </div>

            <div class="mb10">
                <label>Instagram</label>
                <input type="text" name="pageinstagram" placeholder="Le code d'intégration de la page instagram (512 caractères)..." value="<?= $site->pageinstagram ?>">
            </div>

            <div class="mb10">
                <label>Youtube</label>
                <input type="text" name="pageyoutube" placeholder="Le code d'intégration de la chaine Youtube (512 caractères)..." value="<?= $site->pageyoutube ?>">
            </div>

            <div class="mb10">
                <label>Kiuper</label>
                <input type="text" name="pagekiuper" placeholder="Le code d'intégration de la page kiuper (512 caractères)..." value="<?= $site->pagekiuper ?>">
            </div>

            <h2 class="mb20">Autre intégration</h2>

            <div class="mb10">
                <label>Intégration code</label>
                <textarea class="teh60" name="integercode" placeholder="Le code d'intégré s'afficheras dans le contenu ASIDE dasn votre site (512 caractères)..."><?= $site->integercode ?></textarea>
            </div>

            <div>
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
            </div>
        </div>

    </form>
    <div class="clear"></div>
</div>