<div class="links box">
    <h1 class="mb20">Modifier le tag : <?= $tag->tag ?></h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <div class="mb10">
                <label>Description</label>
                <textarea name="description" placeholder="Description du tag"><?= $tag->description ?></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Titre</label>
                <input type="text" name="tag" placeholder="Titre de la page" value="<?= $tag->tag ?>" spellcheck="true"/>
            </div>

            <div class="mb10">
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>