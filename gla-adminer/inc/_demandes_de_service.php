<div class="links box">
    <h1><span class="icon">%</span>Demandes de services</h1>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>
    <table id="gla-table">

        <tr class="tbody">
            <th>#</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Ville</th>
            <th>Besoin</th>
            <th>Date du RDV</th>
            <th>Date d'envoi</th>
            <th>Action</th>
        </tr>

        <?php \Recuperation\Admin::getServicesCommandes($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('commande', 'idC', $db) ?>

    </div>

</div>
