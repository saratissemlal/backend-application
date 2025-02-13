<div class="single content pt40 pb60">

    <div class="c">

        <div class="cont">

            <div class="root pt20 pb20 cl4">
                <?= $GLA->articleParents() ?>
                <a href="<?= WEBROOT . L ?>" class="cl4 hover-cl3"> <?= $asset->text(156) ?> </a> -
                <a href="<?= WEBROOT . L ?>page/services" class="cl4 hover-cl3"> <?= $asset->text(154) ?> </a>
            </div>

            <div class="first-cont flex">

                <div class="photos col-48">

                    <?php if ($GLA->articleImage() !== "") : ?>
                        <img src="<?= $GLA->articleImageFull() ?>" alt="<?= $GLA->articleTitle() ?>" class="first brc brc7" />
                    <?php endif ?>

                    <div class="more-img">

                        <?php

                        $n = 0;

                        foreach ($GLA->articleMoreImage($GLA->articleID()) as $i) {

                            $n++;

                            echo "<img src='" . $GLA->imageMoreUrl($i->nameI) . "' onclick='zoom(this,$n)' class='img-zm img-n$n brc -brc2 brc7' data-id='$n'/>";
                        }

                        ?>

                    </div>

                    <div class="desc mt50 ">

                        <h2 class="h mb20"><?= $asset->text(22) ?></h2>

                        <div class="cnt">
                            <?= $GLA->articleContent() ?>
                        </div>

                    </div>

                </div>

                <div class="ar-cont col-48">

                    <h1 class="h mb10"><?= $GLA->articleTitle() ?></h1>

                    <div class="articles mt40">

                        <?php

                        foreach ($GLA->articleByParent($articleID) as $a) {

                            echo "<a href='" . WEBROOT . L . "$a->url' class='article shadow bg3 cl2'>";

                            if ($a->image !== ""){
                                echo "<img src=" . WEBROOT . "gla-adminer/uploads/article/small/" . $a->image . " alt='" . $a->title . "'/>";
                            }else{
                                echo "<span></span>";
                            }

                            echo "<span>" . $a->title . "</span>";

                            echo "<span class='icon btn hover-cl1 brcN fz2'>|</span>";

                            echo "</a>";
                        }

                        ?>

                    </div>

                    <div class="bg7 p20 fz09">

                        <span class="cl2 d-block mb3"><span class="icon mr8 fz11">&#xe935</span><?= $asset->text(154) ?></span>
                        <span class="cl4 d-block mb5"><?= $asset->text(136) ?></span>
                        <span class="cl2 d-block mb3"><span class="icon mr8 fz11">&#xe95f</span><?= $asset->text(155) ?></span>
                        <span class="cl4 d-block mb10"><?= $asset->text(137) ?></span>

                    </div>

                    <div class="shar f mt20">

                        <span><?= $asset->text(20) ?> <strong><?= $GLA->articleTitle() ?></strong> <?= $asset->text(21) ?></span>

                        <div class="pt20">
                            <span class="icon fb shr mr5 fz11 btn bg3 brc3" data-n="fb">Y</span>
                            <span class="icon tw shr mr5 fz11 btn bg3 brc3" data-n="tw">+</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="<?= Func::cache('theme/assets/js/single.js') ?>"></script>

</div>