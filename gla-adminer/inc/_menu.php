<div class="links box">
    <h1>Menu</h1>
    <a href="action/addLink.php" class="btn b-b"><span class="icon">Z</span> Ajouter un lien</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>

    <table id="gla-table">

        <tr class="tbody">
            <th>#</th>
            <th>Libelle</th>
            <th>Url</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getMenu($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('menu','idM',$db) ?>

    </div>

</div>

<div class="box">
    <ul class="menu-p">

        <?= \Recuperation\Admin::getMenuPlace($db) ?>

    </ul>
</div>
