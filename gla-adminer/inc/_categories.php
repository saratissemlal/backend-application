<div class="links box">
    <h1>Catégories</h1>
    <a href="action/addCategorie.php" class="btn b-b"><span class="icon">Z</span> Ajouter une catégorie</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>
    <table id="gla-table">

        <tr class="tbody header">
            <th>#</th>
            <th>Page</th>
            <th>Url</th>
            <th>Parent</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getCategories($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('categories','idC',$db) ?>

    </div>

</div>

