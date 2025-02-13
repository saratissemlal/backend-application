<aside>

    <div class="a-box">

        <h2><?= $asset->text(31) ?></h2>

        <ul>

            <?php

            foreach ($GLA->articleMostSeen(4) as $a) {

                echo "<a href='".WEBROOT."$a->url'>";
                echo "<li>";
                echo "<img src='".WEBROOT."gla-adminer/uploads/article/small/$a->image' alt='$a->title'/>";
                echo "<span>".substr($a->title,0,40)."..</span>";
                echo "</li>";
                echo "</a>";

            }

            ?>

        </ul>

    </div>

    <div class="a-box tags">

        <span class="h2">Les hashtags</span>

        <?php

        foreach ($GLA->tags(6) as $t) {

            echo "<a href='".WEBROOT."tag/$t->u' class='btn'># $t->tag</a> ";

        }

        ?>

    </div>

</aside>