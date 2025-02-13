<div class="caroussel" id="caroussel">

    <div class="slider">

        <?php

        foreach ($GLA->sliderImages() as $i) {

            echo "<div class='child'>";
            echo "<img src='" . ASSETS . "img/slider/$i->nameI' alt='" . $GLA->siteName() . "'/>";
            echo "</div>";
        }

        ?>

    </div>

    <div class="masq">

        <div class="p40 col-4 bg3">

            <h1 class="h cl2"><?= $asset->text(115) ?></h1>
            <p class="mb40 cl2"><?= $asset->text(116) ?></p>
            <a href="<?= WEBROOT . L ?>page/services" class="btn cl1 bg2 hover-bg1 brc2 hover-brc1 hover-cl2"><?= $asset->text(117) ?></a>

        </div>

    </div>

    <span id="nx" class="btn cl3 icon">_</span>
    <span id="pv" class="btn cl3 icon">_</span>

</div>

<script>
    slider('#caroussel .slider .child', '.slider', <?= $GLA->sliderSpeed() ?>, _('#caroussel'))
</script>

<div class="c1 mb80">
    <div class="c bg1 shadow" id="flash">

        <span class="h fz2 ta-center d-block mb20"><?= $asset->text(118) ?></span>

        <?= Func::getFlash() ?>

        <div class="gla-form flex ai-center home_search">

            <div class="col-32">

                <label><?= $asset->text(126) ?></label>

                <select class="col-10 brc7" name="besoin" onchange="change_1(this)">

                    <option value="" selected disabled hidden><?= $asset->text(125) ?></option>

                    <?php

                    foreach ($GLA->categorieNoParent() as $v) {

                        echo "<option value='$v->idC'>$v->name</option>";
                    }

                    ?>

                </select>

            </div>

            <div class="col-32">

                <label><?= $asset->text(127) ?></label>

                <select class="col-10 brc7" id="besoin_1" onchange="change_2(this)">

                    <option><?= $asset->text(128) ?></option>

                </select>

            </div>

            <div class="col-32">

                <label><?= $asset->text(129) ?></label>

                <select class="col-10 brc7" id="besoin_2" onchange="window.location.href = this.value">

                    <option><?= $asset->text(128) ?></option>

                </select>

            </div>

        </div>

    </div>

</div>

<div class="c2 mb80">

    <div class="c">

        <div class="flex ai-center">

            <div class="col-48">
                <span class="d-block cl3 mb20"><?= $asset->text(63) ?></span>
                <h2 class="h mb30"><?= $asset->text(119) ?></h2>
                <p class="mb30"><?= $asset->text(120) ?></p>
                <a href="<?= WEBROOT . L ?>page/a-propos" class="btn cl1 bg2 brc2 hover-bg3 hover-brc3 hover-cl2"><?= $asset->text(5) ?></a>
            </div>

            <div class="col-48">

                <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(4)) ?>" alt="A propos de nous" class="col-10">

                <div class="flex">
                    <div class="bg3 col-4 pt60 ta-center num">
                        <span class="h d-block fz2"><?= $asset->text(121) ?></span>
                        <span class=""><?= $asset->text(122) ?></span>
                    </div>
                    <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(5)) ?>" alt="A propos de nous" class="col-59">
                </div>

            </div>

        </div>

    </div>

</div>

<div class="c3 bg2 mb80">
    <div class="c flex">

        <div class="flex ai-center">
            <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(17)) ?>" alt="A propos de nous" class="col-59">
            <div>
                <span class="h fz2 d-block cl3"><?= $asset->text(45) ?></span>
                <span class="cl1 fz09"><?= $asset->text(46) ?></span>
            </div>
        </div>

        <div class="flex ai-center">
            <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(18)) ?>" alt="A propos de nous" class="col-59">
            <div>
                <span class="h fz2 d-block cl3"><?= $asset->text(121) ?></span>
                <span class="cl1 fz09"><?= $asset->text(122) ?></span>
            </div>
        </div>

        <div class="flex ai-center">
            <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(19)) ?>" alt="A propos de nous" class="col-59">
            <div>
                <span class="h fz2 d-block cl3"><?= $asset->text(47) ?></span>
                <span class="cl1 fz09"><?= $asset->text(66) ?></span>
            </div>
        </div>

        <div class="flex ai-center">
            <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(20)) ?>" alt="A propos de nous" class="col-59">
            <div>
                <span class="h fz2 d-block cl3"><?= $asset->text(67) ?></span>
                <span class="cl1 fz09"><?= $asset->text(70) ?></span>
            </div>
        </div>


    </div>
</div>

<div class="c4 mb80">

    <div class="c">

        <h2 class="h ta-center mb3 mb50 fz2"><?= $asset->text(3) ?></h2>

        <div class='services grid3'>
            <?php
            $i = 0;
            foreach ($GLA->categorieNoParent() as $c) {
                $i = $i + 1;
                if ($i < 10) {
                    $i = "0" . $i;
                }
                echo "<a href='" . WEBROOT . L . "categorie/" . $c->url . "' class='cat brc1 brc shadow' style=\"background-image: url('" . WEBROOT . "gla-adminer/uploads/article/small/" . $c->image . "');background-size:cover;height:300px\">";

                echo "<p class='cl1'>" . $c->name . "</p>";
                echo "</a>";
            }

            ?>
        </div>

    </div>

</div>

<div class="c5 flex mb80">

    <div class="col-3" style='background-image:url("<?= WEBROOT . L ?>theme/assets/img/large/<?= $asset->pic(4) ?>")'>
        <div class="p50 ta-center">
            <span class="cl2 d-block fz5 mb20 h"><?= $asset->text(71) ?></span>
            <span class="cl2 fz11"><?= $asset->text(73) ?></span>
        </div>
    </div>

    <div class="col-7 bg2 p40">

        <p class="mb20 cl1"><?= $asset->text(74) ?> <span class="cl3 ml20"><span class='icon mr10'>x</span><?= $GLA->siteTele() ?></span></p>
        <p class='mb30 cl1'><?= $asset->text(75) ?></p>
        <a href="<?= WEBROOT . L ?>page/contact" class='btn bg3 brc3 cl2 hover-bg1 hover-brc1'><span class='icon mr10'>E</span><?= $asset->text(11) ?></a>
    </div>

</div>

<div class="c6 bg1 mb80">
    <div class="flex c">
        <div class="col-5 pt40 pb40">
            <h2 class="h fz2 mb30"><?= $asset->text(76) ?></h2>
            <p class="mb30"><?= $asset->text(77) ?></p>
            <div class="flex ai-center apps">
                <a href="https://play.google.com/store/apps/details?id=com.ebricodom" target='_blank' class="col-48"><img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(6)) ?>" alt="Télacharger l'application Android" class="col-10"></a>
                <a href="https://apps.apple.com/dz/app/ebricodom/id1591049486" class="col-48"><img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(7)) ?>" alt="Télacharger l'application IOS" class="col-10"></a>
            </div>
        </div>

        <div class="col-48 p40 ta-center">
            <img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(16)) ?>" alt="Télacharger l'application Android" class="col-7">
        </div>
    </div>
</div>