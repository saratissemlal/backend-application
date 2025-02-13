<footer class="bg2">

    <div class="c">

        <div class="mt40 flex links">

            <div class="col-23 child">
                <h2 class="h mb20"><?= $asset->text(139) ?></h2>
                <a href="<?= WEBROOT.L ?>" title="<?= $GLA->siteName() ?>"><img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(1)) ?>" alt="<?= $GLA->siteName() ?>" class="logo" /></a>
                <p><?= $GLA->siteDesc() ?></p>
            </div>

            <div class="col-23 child">

                <h2 class="h mb20"><?= $asset->text(140) ?></h2>
                <p><span class="icon mr10">x</span><span><?= $GLA->siteTele() ?></span></p>
                <p><span class="icon mr10">G</span><span><?= $GLA->siteEmail() ?></span></p>
                <p><span class="icon mr10">S</span><span><?= $GLA->siteAdresse() ?></span></p>

                <div class="flex jc-center p_fixed bg2">
                    <a href="<?= $GLA->sitePageFacebook() ?>" class="cl1 fz3 mr10 hover-cl3"><span class="icon">Y</span></a>
                    <a href="<?= $GLA->sitePageInstagram() ?>" class="cl1 fz3 mr10 hover-cl3"><span class="icon">&#xe902</span></a>
                    <a href="<?= $GLA->sitePageTwitter() ?>" target="_blank" class="cl1 fz3 mr10 hover-cl3"><span class="icon">.</span></a>
                    <a href="<?= $GLA->sitePageKiuper() ?>" target="_blank" class="cl1 fz3 hover-cl3"><span class="icon">&#xe909</span></a>
                </div>

            </div>

            <div class="col-23 child">
                <h2 class="h mb20"><?= $asset->text(141) ?></h2>
                <?php

                foreach ($GLA->categorieNoParent() as $c) {
                    echo "<a href='" . WEBROOT.L . "categorie/" . $c->url . "'>" . $c->name . "</a>";
                }

                ?>
            </div>

            <div class="col-23 child">
                <h2 class="h mb20"><?= $asset->text(158) ?></h2>
                <a href="<?= WEBROOT.L ?>page/paiement"><?= $asset->text(112) ?></a>
                <a href="<?= WEBROOT.L ?>page/methode-de-travail"><?= $asset->text(113) ?></a>
                <a href="<?= WEBROOT.L ?>page/recrutement"><?= $asset->text(114) ?></a>
                <a href="<?= WEBROOT.L ?>page/mentions-legales"><?= $asset->text(87) ?></a>
                <a href="<?= WEBROOT.L ?>page/conditions-generale-d-utilisation"><?= $asset->text(142) ?></a>
            </div>

        </div>

        <div class="foot mt40 jc-end">
            Créer par &copy <a href="https://www.globalads.dz/" title="Création site web et application mobile en algérie" target="_blank">Global Ads</a>
        </div>

    </div>

</footer>

<?= \Recuperation\Home\Instance::init($_GET['u'], $asset->usedText(), $GLA->langue, $db) ?>

</body>

</html>