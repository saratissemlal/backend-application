<div class="links box">
    <h1><span class="icon">I</span>Mes Commandes</h1>

    <a class="btn b-b" href="?limit=50000">Afficher tous</a>
    <a class="btn b-g" href="?stt=0">Non Validée</a>
    <a class="btn b-b" href="?stt=1">Validées</a>
    <a class="btn b-gr" href="?stt=2">Finalisées</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<?php if (isset($_GET['user'])) {

    $thisuser = $db->select('nom', 'utilisateurs')->where("idU = ?")->find([$_GET['user']], 'utilisateurs.php');

    echo "<div class='box'><h2>Les achats de $thisuser->nom</h2></div>";
} ?>

<div>

    <table id="gla-table">

        <tr class="tbody header">
            <th>#</th>
            <th>Client</th>
            <th>Contact</th>
            <th>Besion</th>
            <th>Intervention</th>
            <th>Platforme</th>
            <th>Demande</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getServicesCommandes($db, \Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('commande', 'idC', $db) ?>

    </div>

</div>

<script>
    function confirm_action(e, el, target = '_self') {

        e.preventDefault();

        url = el.getAttribute('href');

        var conf = window.confirm('Voulez vous vraiment effectuer cette action');

        if (conf == true) window.open(url, target);

    }
</script>