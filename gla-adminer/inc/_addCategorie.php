<div class="links box">
    <h1 class="mb20">Ajouter une catégorie</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <div class="mb10">
                <label>Titre</label>
                <input type="text" name="ctitle" placeholder="Titre de la catégorie" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Déscription</label>
                <textarea class="teh60" name="cdesc" placeholder="Déscription de la catégorie"></textarea>
            </div>

            <div class="mb10">
                <label>Contenu</label>
                <textarea name="content" placeholder="Conrtenu de la catégorie" id="content"></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Titre ARABE</label>
                <input type="text" name="ctitlear" placeholder="Titre de la catégorie en arabe" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Déscription ARABE</label>
                <textarea class="teh60" name="cdescar" placeholder="Déscription de la catégorie en arabe"></textarea>
            </div>

            <div class="mb10">
                <label>Contenu ARABE</label>
                <textarea name="contentar" placeholder="Conrtenu de la catégorie en arabe" id="content_ar"></textarea>
            </div>

            <div class="mb10">
                <label>Parents</label>
                <select name="cparent">
                    <option value="0">Aucun</option>
                    <?= \Recuperation\Admin::getParentCats($db) ?>
                </select>
                <p class="rem">Sélectionnez le parent de cette catégorie, Si cette catégorie n'as pas de parent laissez sur Aucun</p>
            </div>

            <div class="mb10 mt20">
                <input type="file" name="image" id="imgFile" class="imgFile" onchange="loadImg()" />
                <span class="btn b-b" onclick="Q('#imgFile').click()"><span class="icon">D</span> Image à la une</span>
                <input type="hidden" name="imagenom" id="imgName" value="" />
            </div>

            <div class="mb10">

                <div class="load-box" id="loadBox">
                    <img src="<?= Func::cache('gla-adminer/assets/image/loader.gif') ?>" class="loader" />
                    <span class="l-prc"></span>
                </div>

                <button type="submit" name="submit" class="btn b-g" id="btnLoad"><span class="icon">W</span> Enregistrer</button>
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