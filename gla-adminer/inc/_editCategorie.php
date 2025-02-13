<div class="links box">
    <h1 class="mb20">Modifier la catégorie : <?= $categorie->name ?></h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <div class="mb10">
                <label>Titre</label>
                <input type="text" name="ctitle" placeholder="Titre de la catégorie" value="<?= $categorie->name ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Déscription</label>
                <textarea class="teh60" name="cdesc" placeholder="Déscription de la catégorie"><?= $categorie->description ?></textarea>
            </div>

            <div class="mb10">
                <label>Contenu</label>
                <textarea name="content" placeholder="Conrtenu de la catégorie" id="content"><?= $categorie->content ?></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Titre ARABE</label>
                <input type="text" name="ctitlear" placeholder="Titre de la catégorie en arabe" value="<?= $categorie->namear ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Déscription ARABE</label>
                <textarea class="teh60" name="cdescar" placeholder="Déscription de la catégorie en arabe"><?= $categorie->descriptionar ?></textarea>
            </div>

            <div class="mb10">
                <label>Contenu ARABE</label>
                <textarea name="contentar" placeholder="Conrtenu de la catégorie en arabe" id="content_ar"><?= $categorie->contentar ?></textarea>
            </div>

            <div class="mb10">
                <label>Parents</label>
                <select name="cparent">
                    <?php

                    if (empty($categorie->parent)) {
                        echo "<option value='0'>Aucun</option>";
                    } else {
                        echo "<option value='" . $categorie->parent . "'>" . \Recuperation\Admin::getCatById($categorie->parent, $db) . "</option>";
                        echo "<option value='0'>Aucun</option>";
                    }

                    ?>
                    <?= \Recuperation\Admin::getParentCats($db) ?>
                </select>
                <p class="rem">Sélectionnez le parent de cette catégorie, Si cette catégorie n'as pas de parent laissez sur Aucun</p>
            </div>

            <div class="mb10">

                <?php if (!empty($categorie->image)) : ?>
                    <img src="<?= Func::cache("gla-adminer/uploads/article/small/$categorie->image") ?>" class="w50" />
                <?php endif ?>

                <span class="opt">
                    <input type="file" name="image" id="imgFile" class="imgFile" onchange="catEditImage(this,<?= $categorie->idC ?>, '<?= $categorie->image ?>')" />
                    <span class="btn b-g" onclick="Q('#imgFile').click()">Modifier l'image</span>
                </span>


            </div>

            <div class="mb10">
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#content, #content_ar',
        height: 500,
        theme: 'modern',
        mobile: {
            theme: 'mobile'
        },
        menubar: false,
        plugins: [
            'advlist autolink lists link image imagetools charmap print preview anchor media table contextmenu paste wordcount code'
        ],
        toolbar: 'insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code | 2columns'
    });
</script>