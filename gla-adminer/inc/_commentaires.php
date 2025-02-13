<div class="links box">
    <h1>Commentaires</h1>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>

</div>

<?= Func::getFlash() ?>

<div>
    <table id="gla-table">

        <tr class="tbody header">
            <th>#</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Article</th>
            <th>Commentaire</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getComments($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('comment','idC',$db) ?>

    </div>

</div>
