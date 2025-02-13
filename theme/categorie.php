<div class="category">

    <div class="cat_head" style='background-image:url("<?= WEBROOT.L ?>gla-adminer/uploads/article/small/<?= $GLA->catImg() ?>")'>
        <div class="pt50 pb50">
            <h1 class="h cl2 cc ta-center"><?= $GLA->catTitle() ?></h1>
        </div>
    </div>

    <div class="content pt40 pb10">

        <div class="c">

            <div class="cont">

                <div class="fz09 cl4 mb30">
                    <a href="<?= WEBROOT.L ?>" class="cl4 hover-cl3"> <?= $asset->text(156) ?> </a>/
                    <a href="<?= WEBROOT.L ?>page/services" class="cl4 hover-cl3"> <?= $asset->text(154) ?> </a>/
                    <a href="<?= $GLA->catUrl() ?>" class="cl4 hover-cl3"> <?= $GLA->catTitle() ?></a>
                </div>

                <?= $GLA->catDesc() ?>

                <h2 class="fz2 mt40"><?= $asset->text(157) ?></h2>

                <div class="articles mt40 flex">

                    <?php

                    foreach ($GLA->articleByCategoriePagination() as $a) {

                        echo "<a href='" . WEBROOT.L . "$a->url' class='article shadow bg3 col-48 cl2'>";

                        echo "<img src=" . WEBROOT . "gla-adminer/uploads/article/small/" . $a->image . " alt='" . $a->title . "'/>";

                        echo "<span>" . $a->title . "</span>";

                        echo "<span class='icon btn hover-cl1 brcN fz2'>|</span>";

                        echo "</a>";
                    }

                    ?>

                </div>

                <div class="gla-pagination mt30">

                    <?= $GLA->getPagination(); ?>

                </div>

            </div>

            <div class="mb40">
                <?= $GLA->catContent() ?>
            </div>

        </div>

        <div class="c3 bg2">
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

    </div>

</div>