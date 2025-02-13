<?php

if (isset($_POST['submit'])) {

    if (!empty($_POST['nom']) && !empty($_POST['message'])) {

        $db->query("INSERT INTO contact (name,email,numero,message,date,statu) VALUES (?,?,?,?,?,?)", [$_POST['nom'], $_POST['email'], $_POST['numero'], $_POST['message'], time(), 0]);
        Func::setFlash('succes', $asset->text(15));
    } else {

        Func::setFlash('error', 'Veuillez remplire votre nom complet et le message');
    }

    Func::redirect('#flash');
}

?>

<div class="content contact mt30 mb30">

    <div class="c flex">

        <div class="box col-5 p20 bg2 cl1">

            <h1 class="h"><?= $asset->text(2) ?></h1>

            <?= Func::getFlash() ?>

            <?= $GLA->pageContent() ?>

            <form action="" method="POST" class="gla-form connect mt20">

                <div class="flex">
                    <input type="text" name="nom" placeholder="<?= $asset->text(7) ?>" required="true" class="col-32 brc7 bg1 cl2" />
                    <input type="email" name="email" placeholder="<?= $asset->text(8) ?>" required="true" class="col-32 brc7 bg1 cl2" />
                    <input type="text" name="numero" placeholder="<?= $asset->text(14) ?>" required="true" class="col-32 brc7 bg1 cl2" />
                </div>

                <textarea name="message" placeholder="<?= $asset->text(15) ?>" required="true" class="col-10 brc7 bg1 cl2 mt20"></textarea>

                <input type="submit" name="submit" value="<?= $asset->text(16) ?>" class="btn bg3 cl2 hover-bg1 brc3 hover-brc1" />

            </form>

        </div>

        <div class="col-48">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1879.1506507578936!2d5.0559644867837354!3d36.74504457509105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDQ0JzQxLjIiTiA1wrAwMycyMy45IkU!5e0!3m2!1sfr!2sdz!4v1629135377947!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            
            <ul class="mt20 p0">
                <li class="mb3"><span class="icon">x</span> <?= $GLA->siteTele() ?></li>
                <li class="mb3"><span class="icon">J</span> <?= $GLA->siteEmail() ?></li>
                <li class="mb3"><span class="icon">S</span> <?= $GLA->siteAdresse() ?></li>
            </ul>


        </div>



    </div>



</div>