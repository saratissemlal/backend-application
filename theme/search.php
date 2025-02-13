<div class="category">

    <div class="cat_head bg7">
        <div class="pt50 pb50">
            <span class="ta-center d-block fz09 mb10">Résultat de recherche sur</span>
            <h1 class="h cl2 cc ta-center"><?= $_GET['s'] ?></h1>
        </div>
    </div>
<div class="content pt40 pb40">

    <div class="c">

        <div class="flex">

            <div class="cont col-78">

                <div class="articles">

                    <?php
                    
                    $query = \Root\Search::articles($_GET['s'],50,$db);

                    if(empty($query)) echo "<p class='rem'>".$asset->text(18)." <strong>".$_GET['s']."</strong></p>";
        
                    foreach ($query as $a) {
                        echo "<a href='" . WEBROOT . L . "$a->url' class='article shadow bg3 col-10 cl2'>";

                        if(!empty($a->image)) echo "<img src=" . WEBROOT . "gla-adminer/uploads/article/small/" . $a->image . " alt='" . $a->title . "'/>";

                        echo "<span>" . $a->title . "</span>";

                        echo "<span class='icon btn hover-cl1 brcN fz2'>|</span>";

                        echo "</a>";
                    }

                    ?>

                </div>

            </div>

        
            <?php include "theme/aside/aside.php" ?>
    
        </div>

    </div>

</div>

</div>

