<div class="page">

    <div class="content">

        <div class="c">

            <div>

                <h1 class="mb30 mt30"><?= $asset->text(61) ?></h1>

                <p><?= $asset->text(62) ?></p>

            </div>

            <div class="c4 mt80 mb80">

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
                            echo "<a href='" . WEBROOT.L . "categorie/" . $c->url . "' class='cat brc1 brc shadow' style=\"background-image: url('" . WEBROOT.L . "gla-adminer/uploads/article/small/" . $c->image . "');background-size:cover;height:300px\">";

                            echo "<p class='cl1'>" . $c->name . "</p>";
                            echo "</a>";
                        }

                        ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>