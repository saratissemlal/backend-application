<div class="links box">
    <h1>Cards</h1>
    <a href="action/addCard.php" class="btn b-b"><span class="icon">Z</span> Ajouter un card</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>

    <table id="gla-table">

        <tr class="tbody header">
            <th>#</th>
            <th>Url</th>
            <th>Image</th>
            <th>Date d'ajout</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getCards($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('cards','idC',$db) ?>

    </div>

</div>