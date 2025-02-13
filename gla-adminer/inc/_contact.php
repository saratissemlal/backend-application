<div class="links box">
    <h1><span class="icon">%</span>Messages Reçus</h1>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>
    <table id="gla-table">

        <tr class="tbody">
            <th>#</th>
            <th>Nom</th>
            <th>Téléphone / Email</th>
            <th>Date envoi</th>
            <th>Message</th>
            <th>Action</th>
        </tr>

        <?php \Recuperation\Admin::getMessages($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('contact','idC',$db) ?>

    </div>

</div>
