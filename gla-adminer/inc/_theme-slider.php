<div class="links box">
    <h1>Slider Images</h1>

    <input type="file" name="image" id="imgFile" class="imgFile" onchange="sliderAddPics(this)"/>
    <span class="btn b-b" onclick="Q('#imgFile').click()"><span class="icon">Z</span> Ajouter une image</span>

</div>

<?= Func::getFlash() ?>

<div class="box galerie">

    <div class="site">

        <?= \Recuperation\Slider::getImages($db); ?>

    </div>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>

<div class="box t_color">
    <h1 class="mb20">Slider vitesse d'animation</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">

    <div class="left">

        <div class="mb10">
            <label>Vitesse (par secondes)</label>

            <input type="number" name="sl_sp" placeholder="vitesse" value="<?= $theme->sl_sp ?>"/>
        </div>

    </div>

    <div class="right">

        <div>
            <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
        </div>
    </div>

    </form>
    <div class="clear"></div>
</div>
