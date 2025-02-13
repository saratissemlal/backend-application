<div class="links box">
    <h1 class="mb20">Modifier la page : <?= $page->name ?></h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <div class="mb10">
                <label>Titre</label>
                <input type="text" name="ptitle" placeholder="Titre de la page" value="<?= $page->name ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Contenu</label>
                <textarea name="pcontent" placeholder="Contenu de la page" id="content"><?= $page->content ?></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Titre ARABE</label>
                <input type="text" name="ptitlear" placeholder="Titre de la page eb arabe" value="<?= $page->namear ?>" spellcheck="true" />
            </div>

            <div class="mb10">
                <label>Contenu ARABE</label>
                <textarea name="pcontentar" placeholder="Contenu de la page eb arabe" id="content_ar"><?= $page->contentar ?></textarea>
            </div>

            <div class="mb10">
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>

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