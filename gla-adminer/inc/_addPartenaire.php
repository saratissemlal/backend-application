<div class="links box">
    <h1 class="mb20">Ajouter un partenaire</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="left">

            <div class="mb10">
                <label>Nom du partenaire</label>
                <input type="text" name="name" placeholder="Nom ..." spellcheck="true" required="true"/>
            </div>

        </div>

        <div class="right">

            <div class="mb10 mt20">
                <input type="file" name="image" id="imgFile" class="imgFile" onchange="loadCatImg()"/>
                <span class="btn b-b" onclick="Q('#imgFile').click()"><span class="icon">D</span> Image à la une</span>
                <input type="hidden" name="imagenom" id="imgName" value="" required="true"/>
            </div>

            <div class="mb10">

                <div class="load-box" id="loadBox">
                    <img src="<?= Func::cache('gla-adminer/assets/image/loader.gif') ?>" class="loader"/>
                    <span class="l-prc"></span>
                </div>

                <button type="submit" name="submit" class="btn b-g" id="btnLoad"><span class="icon">W</span> Enregistrer</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>
