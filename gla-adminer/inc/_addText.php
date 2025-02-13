<div class="links box">
    <h1 class="mb20">Ajouter un texte</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">

        <div>

            <div class="mb10 left">
                <label>Texte</label>
                <textarea name="texte" placeholder="Votre texte"></textarea>
            </div>

            <div class="mb10 right">
                <label>Texte Arabe</label>
                <textarea name="textear" placeholder="Votre texte en arabe"></textarea>
            </div>

            <div class="mb10">
                <button type="submit" name="submit" class="btn b-g"><span class="icon">Z</span> Ajouter</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>