<div class="box t_color">
    <h1 class="mb20">Couleurs du site</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
    <div class="left">

        <div class="f">

            <div class="mb10">
                <input type="color" name="c1" value="<?= $theme->c1 ?>"/>
                <label>Couleur 1</label>
            </div>

            <div class="mb10">
                <input type="color" name="c2" value="<?= $theme->c2 ?>"/>
                <label>Couleur 2</label>
            </div>

        </div>

        <hr/>

        <div class="f">

            <div class="mb10">
                <input type="color" name="c3" value="<?= $theme->c3 ?>"/>
                <label>Couleur 3</label>
            </div>

            <div class="mb10">
                <input type="color" name="c4" value="<?= $theme->c4 ?>"/>
                <label>Couleur 4</label>
            </div>

        </div>

        <hr/>

        <div class="f">

            <div class="mb10">
                <input type="color" name="c5" value="<?= $theme->c5 ?>"/>
                <label>Couleur 5</label>
            </div>

            <div class="mb10">
                <input type="color" name="c6" value="<?= $theme->c6 ?>"/>
                <label>Couleur 6</label>
            </div>

        </div>

    </div>

    <div class="right">

        <div class="f">

            <div class="mb10">
                <input type="color" name="c7" value="<?= $theme->c7 ?>"/>
                <label>Couleur 7</label>
            </div>

            <div class="mb10">
                <input type="color" name="c8" value="<?= $theme->c8 ?>"/>
                <label>Couleur 8</label>
            </div>

        </div>

        <hr/>

        <div class="f">

            <div class="mb10">
                <input type="color" name="c9" value="<?= $theme->c9 ?>"/>
                <label>Couleur 9</label>
            </div>

            <div class="mb10">
                <input type="color" name="c10" value="<?= $theme->c10 ?>"/>
                <label>Couleur 10</label>
            </div>

        </div>

        <div>
            <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
        </div>
    </div>

    </form>
    <div class="clear"></div>
</div>
