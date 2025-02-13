<div class="links box">
    <h1 class="mb20">Ajouter un tag</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
        <div class="left">

            <div class="mb10">
                <label>Description</label>
                <textarea name="description" placeholder="Description du tag ..." required="true"></textarea>
            </div>

        </div>

        <div class="right">

            <div class="mb20">
                <label>Tag</label>
                <input type="text" name="tag" placeholder="Tag ..." required="true" spellcheck="true"/>
            </div>

            <div class="mb10">
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Ajouter</button>
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>