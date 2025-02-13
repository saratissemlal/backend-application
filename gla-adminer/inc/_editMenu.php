<div class="links box">
    <h1 class="mb20">Modifier menu : <?= $menu->name ?></h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <div class="mb10">
                <label>Libelle</label>
                <input type="text" name="title" placeholder="Titre du lien" value="<?= $menu->name ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Libelle ARABE</label>
                <input type="text" name="titlear" placeholder="Titre du lien en arabe" value="<?= $menu->namear ?>" spellcheck="true" />
            </div>

        </div>

        <div class="right">

            <h2 class="mb20">Redirection</h2>
            <p class="rem mb20">Sélectionnez ou vous voullez que le lien point.</p>

            <div class="mb10">
                <label>Pages interne</label>
                <select name="url">
                    <option value="">Acceuil</option>
                    <optgroup label="Pages">
                        <?= \Recuperation\Admin::getPagesMenu($db) ?>
                    </optgroup>
                    <optgroup label="Catgégories">
                        <?= \Recuperation\Admin::getCatsMenu($db) ?>
                    </optgroup>

                </select>
            </div>

            <div class="mb10">
                <label>Autre pages (interne ou externe)</label>
                <input type="text" name="urlautre" placeholder="Liens interne ou externe" value="<?= $menu->url ?>" />
                <p class="rem mb20">Si vous laissez ce champs vide l'URL seras séléctioner automatiquement dans Pages interne</p>
            </div>

            <div class="mb10">
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>