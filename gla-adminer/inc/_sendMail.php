<div class="links box">
    <h1 class="mb20">Envoyer une mail à <strong><?= $_GET['email'] ?></strong></h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="left">

            <div class="mb10">
                <label>Sujet</label>
                <input type="text" name="sujet" placeholder="Sujet de l'email"/>
            </div>

            <div class="mb10">
                <label>Contenu</label>
                <textarea name="mail" placeholder="Conrtenu de l'article" id="content"></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mt20 ">
                <button type="submit" name="submit" class="btn b-g" id="btnLoad"><span class="icon">W</span> Envoyer</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>

    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link charmap print anchor'
        ],
        toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link'
    });
</script>
