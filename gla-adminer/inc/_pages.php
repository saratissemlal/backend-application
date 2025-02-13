<div class="links box">
    <h1>Pages</h1>
    <a href="action/addPage.php" class="btn b-b"><span class="icon">Z</span> Ajouter une page</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>
    <table id="gla-table">

        <tr class="tbody">
            <th>#</th>
            <th>Page</th>
            <th>Url</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getPages($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('pages','idP',$db) ?>

    </div>

</div>
