<div class="links box">
    <h1>Galerie</h1>

    <input type="file" name="image" id="imgFile" class="imgFile" onchange="galerieAddPics(this)"/>
    <span class="btn b-b" onclick="Q('#imgFile').click()"><span class="icon">Z</span> Ajouter une image</span>

</div>

<?= Func::getFlash() ?>

<div class="box galerie">

    <div class="site">

        <?= \Recuperation\Galerie::getImages('site',$db); ?>

    </div>






<?php
/*
foreach(glob("uploads/article/small/*.jpg") AS $i){
    echo "<div>";
    echo "<img src='".$_SESSION['Root']."gla-adminer/$i'/>";
    echo "<span class='opt'>";
    echo "<a href='control/delletImage.php?id=".str_replace('uploads/article/small/','',$i)."' class='btn b-r'>Supprimer</a>";
    echo "<a href='action/edit/image.php?id=".str_replace('uploads/article/small/','',$i)."' class='btn b-g'>Modifier</a>";
    echo "</span>";
    echo "</div>";
}
*/

?>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>
