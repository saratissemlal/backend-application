<div class="links box">
    <h1>Ajouter des photos</h1>
    <input type="file" name="image" id="imgFile" class="imgFile" multiple onchange="addMoreImg(<?= $_GET['id'] ?>)"/>
    <span class="btn b-b" onclick="Q('#imgFile').click()"><span class="icon">D</span> Ajouter des images</span>

    <span class="load-box" id="loadBox">
        <img src="<?= Func::cache('gla-adminer/assets/image/loader.gif') ?>" class="loader"/>
        <span class="l-prc"></span>
    </span>
</div>

<?= Func::getFlash() ?>

<div class="box galerie">

    <?php

    foreach(\Recuperation\Admin::getMorePics($_GET['id'],$db) AS $i){

        echo "<div class='img'>";
        echo "<img src='".WEBROOT."gla-adminer/uploads/image/$i->nameI'/>";
        echo "<span class='opt'>";
        echo "<a href='../control/delletPics.php?img=$i->nameI&id=".$_GET['id']."' class='btn b-r'>Supprimer</a>";
        echo "<a href='action/edit/pics.php?img=$i->nameI' class='btn b-g'>Modifier</a>";
        echo "</span>";
        echo "</div>";

    }

    ?>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>