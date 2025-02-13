<div class="links box">
    <h1 class="mb20">Ajouter un article</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="left">

            <div class="mb10">
                <label>Titre</label>
                <input type="text" name="title" placeholder="Titre de l'article" spellcheck="true" required='true' <?php if (isset($_POST['title'])) echo "value='" . $_POST['title'] . "'"; ?> />
            </div>

            <div class="mb10">
                <label>Contenu</label>
                <textarea name="content" placeholder="Conrtenu de l'article" id="content"><?php if (isset($_POST['content'])) echo $_POST['content']; ?></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Titre ARABE</label>
                <input type="text" name="titlear" placeholder="Titre de l'article en arabe" spellcheck="true" required='true' <?php if (isset($_POST['titlear'])) echo "value='" . $_POST['titlear'] . "'"; ?> />
            </div>

            <div class="mb10">
                <label>Contenu ARABE</label>
                <textarea name="contentar" placeholder="Conrtenu de l'article en arabe" id="content_ar"><?php if (isset($_POST['contentar'])) echo $_POST['contentar']; ?></textarea>
            </div>


            <?php if (!isset($_GET['parent'])) : ?>

                <div class="mb10">
                    <label>Catégorie</label>
                    <select name="categorie">
                        <?= \Recuperation\Admin::getCats($db) ?>
                    </select>
                </div>

            <?php endif ?>

            <?php if (isset($_GET['parent'])) : ?>

                <div class="mb10">
                    <label>Catégorie parent (Article parent)</label>
                    <select name="parent">
                        <?= \Recuperation\Admin::getArticlesList($db) ?>
                    </select>
                </div>

            <?php endif ?>

            <div class="mb10 mt20">
                <input type="file" name="image" id="imgFile" class="imgFile" onchange="loadImg()" />
                <span class="btn b-b" onclick="Q('#imgFile').click()"><span class="icon">D</span> Image à la une</span>
                <input type="hidden" name="imagenom" id="imgName" value="" />
            </div>

            <div class="group">

                <div class="mb10">
                    <label>Prix minimum</label>
                    <input type="number" name="price_min" placeholder="Prix minimum ..." <?php if (isset($_POST['price_min'])) echo "value='" . $_POST['price_min'] . "'"; ?> />
                </div>

                <div class="mb10">
                    <label>Prix maximum</label>
                    <input type="number" name="price_max" placeholder="Prix maximum ..." <?php if (isset($_POST['price_max'])) echo "value='" . $_POST['price_max'] . "'"; ?> />
                </div>

            </div>

            <!--
            <div class="mb10">
                <label>Hashtags</label>

                <div class="tags">

                    <?= \Recuperation\Tags::tagList($db); ?>

                </div>
            </div>

-->

            <div class="mb10">

                <div class="load-box" id="loadBox">
                    <img src="<?= Func::cache('gla-adminer/assets/image/loader.gif') ?>" class="loader" />
                    <span class="l-prc"></span>
                </div>

                <button type="submit" name="submit" class="btn b-g" id="btnLoad"><span class="icon">W</span> Enregistrer</button>
            </div>

            <!--
            <div class="mb10 mt20">
                <input type="checkbox" name="showcomments" checked /> <strong>Afficher les commentaire</strong> (Formulaire et commentaires postés)
            </div>
-->

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