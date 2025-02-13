<div class="links box">
    <h1>Textes</h1>
    <a href="action/addText.php" class="btn b-b"><span class="icon">Z</span> Ajouter un texte</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>

    <div class="left">
        <script src='<?= \Func::cache('gla-adminer/assets/js/gla-home.js') ?>'></script>

        <table id="gla-table">

            <tr class="tbody">
                <th>Id</th>
                <th>Texte</th>
                <th>Actions</th>
            </tr>

            <?php \Recuperation\Textes::Textes('texte', $db); ?>

        </table>
    </div>

    <div class="right">

        <table id="gla-table">

            <tr class="tbody">
                <th>Id</th>
                <th>Texte</th>
                <th>Actions</th>
            </tr>

            <?php \Recuperation\Textes::Textes('textear', $db); ?>

        </table>
    </div>

</div>