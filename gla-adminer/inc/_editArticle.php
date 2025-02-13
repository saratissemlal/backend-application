<div class="links box">
    <h1 class="mb20">Modifier l'article : <?= $article->title ?> </h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="left">

            <div class="mb10">
                <label>Titre</label>
                <input type="text" name="title" placeholder="Titre de l'article" value="<?= $article->title ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Contenu</label>
                <textarea name="content" placeholder="Conrtenu de l'article" id="content"><?= $article->content ?></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Titre ARABE</label>
                <input type="text" name="titlear" placeholder="Titre de l'article en arabe" value="<?= $article->titlear ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Contenu ARABE</label>
                <textarea name="contentar" placeholder="Conrtenu de l'article en arabe" id="content_ar"><?= $article->contentar ?></textarea>
            </div>

            <?php if ($article->categorie != 0) : ?>

                <div class="mb10">
                    <label>Catégorie</label>
                    <select name="categorie">
                        <option value="<?= $article->categorie ?>"><?= \Recuperation\Admin::getCatById($article->categorie, $db) ?></option>
                        <?= \Recuperation\Admin::getCats($db) ?>
                    </select>
                </div>

            <?php endif ?>

            <?php if ($article->parent != 0) : ?>

                <div class="mb10">
                    <label>Catégorie parent (Article parent)</label>
                    <select name="parent">
                        <?= \Recuperation\Admin::getArticlesList($db) ?>
                    </select>
                </div>

            <?php endif ?>

            <div class="galerie">

                <div class="mb10">

                    <img src="<?= Func::cache("gla-adminer/uploads/article/full/$article->image") ?>" class="w100" />
                    <span class="opt">
                        <a href="<?= WEBROOT . "gla-adminer/action/edit/image.php?id=$article->idA&img=$article->image" ?>" class="btn b-g">Modifier l'image</a>
                    </span>


                </div>

            </div>

            <div class="group">

                <div class="mb10">
                    <label>Prix minimum</label>
                    <input type="number" name="price_min" placeholder="Prix minimum ..." value="<?= $article->price_min ?>" />
                </div>

                <div class="mb10">
                    <label>Prix maximum</label>
                    <input type="number" name="price_max" placeholder="Prix maximum ..." value="<?= $article->price_max ?>" />
                </div>

            </div>

            <!--

            <div class="mb10">
                <label>Tag</label>

                <div class="tags">

                    <?= \Recuperation\Tags::tagList($db, $article->idA); ?>

                </div>
            </div>

            -->

            <div class="mb10">

                <div class="load-box" id="loadBox">
                    <img src="<?= Func::cache('gla-adminer/assets/image/loader.gif') ?>" class="loader" />
                    <span class="l-prc">27 %</span>
                </div>

                <button type="submit" name="submit" class="btn b-g" id="btnLoad"><span class="icon">W</span> Enregistrer</button>
            </div>

            <div class="mb10 mt20">
                <input type="checkbox" name="showcomments" <?php if ($article->showc == 1) echo 'checked' ?> /> <strong>Afficher les commentaire</strong> (Formulaire et commentaires postés)
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
        toolbar: 'insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code'
    });
</script>