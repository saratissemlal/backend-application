<div class="links box">
    <h1>Produits</h1>
    <a href="action/addArticles.php<?php if (isset($_GET['cat']) && $_GET['cat'] !== '0') echo '?cat=' . $_GET['cat'] ?><?php if (isset($_GET['parent']) && $_GET['parent'] !== '0') echo '?parent=' . $_GET['parent'] ?>" class="btn b-b"><span class="icon">Z</span> Ajouter un produit</a>

    <a href="?limit=show_all" class="btn b-gr">Afficher tout</a>

    <?php if (!isset($_GET['parent'])) : ?>

        <select onchange="window.location.href = '?cat=' + this.value" style="width: 300px;">
            <option value="0">Afficher tout</option>
            <?php

            foreach (\Recuperation\Admin::getCategoriesList($db) as $c) {

                $selected = (isset($_GET['cat']) && $_GET['cat'] == $c->idC) ? 'selected' : '';

                echo "<option value='$c->idC' $selected>$c->name</option>";
            }

            ?>
        </select>

    <?php endif ?>

    <input type="text" id="filter" onkeyup="filter(this)" placeholder="Filtrer ...">
    <script src="<?= Func::cache('gla-adminer/assets/js/filter.js') ?>"></script>
</div>

<?php if (isset($_GET['parent'])) : ?>
<div class="link box">

    <h2>Articel : <?= \Recuperation\Admin::getArticleById($_GET['parent'], $db)->title ?></h2>

</div>
<?php endif ?>

<?= Func::getFlash() ?>

<div>

    <table id="gla-table">

        <tr class="tbody header">
            <th>#</th>
            <th>Titre</th>
            <th>Image</th>
            <th>Montant</th>
            <th>Date publication</th>
            <th>Actions</th>
        </tr>

        <?php \Recuperation\Admin::getArticles($db, \Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('articles', 'idA', $db) ?>

    </div>

</div>