<div class="links box">
    <h1>Historique de connexion</h1>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div class="box">
    <table id="gla-table">

        <tr class="tbody">
            <th>#</th>
            <th>Ip</th>
            <th>Agent</th>
            <th>Connecter par</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php \Recuperation\Admin::getHistory($db) ?>

    </table>

</div>
