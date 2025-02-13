<div class="links box">
    <h1><span class="icon">,</span>Membres</h1>

    <a href="?limit=true" class="btn b-b">Afficher tout</a>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?= Func::getFlash() ?>

<div>

    <table id="gla-table">

        <tr class="tbody header">
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>Date publication</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Utilisateurs::getUtilisateurs($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('utilisateurs','idU',$db) ?>

    </div>

</div>

<script>
    function confirm_action(e,el,target = '_self'){

        e.preventDefault();

        url = el.getAttribute('href');

        var conf = window.confirm('Voulez vous vraiment effectuer cette action');

        if(conf == true) window.open(url,target);

    }
</script>
