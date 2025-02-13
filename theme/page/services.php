<div class="category">

    <div class="cat_head bg7">
        <div class="pt50 pb50">
            <h1 class="h cl2 cc ta-center"><?= $GLA->pageTitle() ?></h1>
        </div>
    </div>
    <div class="content pt40 pb40">

        <div class="c">

            <div class='services grid3'>
                <?php
                $i = 0;
                foreach ($GLA->categorieNoParent() as $c) {
                    $i = $i + 1;
                    if ($i < 10) {
                        $i = "0" . $i;
                    }
                    echo "<a href='" . WEBROOT.L . "categorie/" . $c->url . "' class='cat brc1 brc shadow' style=\"background-image: url('" . WEBROOT . "gla-adminer/uploads/article/small/" . $c->image . "');background-size:cover;height:300px\">";

                    echo "<p class='cl1'>" . $c->name . "</p>";
                    echo "</a>";
                }

                ?>
            </div>

        </div>

    </div>

</div>