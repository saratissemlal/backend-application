<div class="links box">
    <h1>Tags</h1>
    <a href="action/addTag.php" class="btn b-b"><span class="icon">Z</span> Ajouter un tag</a>
</div>

<?= Func::getFlash() ?>

<div>
    <table>

        <tr class="tbody">
            <td>#</td>
            <td>Tag</td>
            <td>Description</td>
            <td>Date</td>
            <td>Actions</td>
        </tr>

        <?= \Recuperation\Tags::tags($db,\Recuperation\Admin::limit()) ?>

    </table>

    <div class="pagination">

        <?= \Recuperation\Admin::paginationBtn('tags','idT',$db) ?>

    </div>

</div>
