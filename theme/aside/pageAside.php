<aside class="page-aside">

    <div class="box">

        <span class="h">Toutes les pages</span>
        <div class="cnt pag">

            <a href="<?=WEBROOT?>page/a-propos"><?= $asset->text(63) ?></a>
            <a href="<?=WEBROOT?>page/contact"><?= $asset->text(2) ?></a>
            <a href="<?=WEBROOT?>page/panier"><?= $asset->text(40) ?></a>
            <a href="<?=WEBROOT?>page/livraison"><?= $asset->text(64) ?></a>
            
        </div>
    </div>

    <div class="box">

        <span class="h">Restez à jour</span>
        <div class="cnt shar social">
            <a href="<?= $GLA->sitePageFacebook() ?>" target="_blank"><span class="icon fb">Z</span></a>
            <a href="<?= $GLA->sitePageTwitter() ?>" target="_blank"><span class="icon tw">.</span></a>
            <a href="<?= $GLA->sitePageInstagrame() ?>" target="_blank"><span class="icon gp">&#xe902</span></a>
            <a href="<?= $GLA->sitePageYoutube() ?>" target="_blank"><span class="icon yt">&#xe906</span></a>
            <a href="<?= $GLA->sitePageKiuper() ?>" target="_blank" title="Khedma Shop Kiuper"><span class="icon kiu">&#xe909</span></a>
        </div>

    </div>

    <div class="box">

        <span class="h">Les plus vendu</span>

        <div class="cnt">
            <?php

            foreach ($GLA->articleMostSeen(4) as $a) {
                echo "<div class='article'>";
                echo "<a href='".WEBROOT."$a->url'>";
                echo "<img src=".WEBROOT."gla-adminer/uploads/article/small/".$a->image." alt='title'/>";
                echo "<div class='ctn'>";
                echo "<span class='t'>".$a->title."</span>";
                echo $GLA->getPrice($a->prix, $a->remise,"PROMO");
                echo "</div>";
                echo "</a>";
                echo "<div class='button'>";
                echo "<button type='submit' class='pan' onclick='panier($a->idA)'><span class='icon'>ù</span>Ajouter au panier</button>";
                echo "<button type='submit' class='fav'><span class='icon'>&#xe925</span></button>";
                echo "</div>";
                echo "</div>";
            }
            ?>

        </div>



    </div>

</aside>