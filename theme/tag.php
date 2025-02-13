<?php $GLA->tagSee() ?>

<div class="category">

    <div class="cat_head bg7">
        <div class="pt50 pb50">
            <h1 class="h cl3 cc ta-center"><?= $GLA->tagTitle() ?></h1>
        </div>
    </div>
<div class="content pt40 pb40">

    <div class="c">

        <div class="flex">

            <div class="cont col-78">

                <div class="articles grid4">

                    <?php
                    $page = (empty($_GET['page'])) ? 1 : $_GET['page'];
                    foreach($GLA->articlesByTagPAgination($page) as $a){
                        echo "<div class='article'>";

                        echo "<img src=".WEBROOT.L."gla-adminer/uploads/article/small/".$a->image." alt='".$a->title."'/>"; 
                        echo $GLA->getPrice($a->prix, $a->remise,"PROMO");
                        echo "<span class='title'>".$a->title."</span>";

                        echo "<div class='details'>";

                        echo "<span>EN STOCK : 02</span>";

                        echo "<div class='op'>";
                        echo "<span>S</span>";
                        echo "<span>M</span>";
                        echo "<span>L</span>";
                        echo "<span>XL</span>";
                        echo "</div>";

                        echo "<div class='colors op'>";
                        echo "<span class='bg-white'></span>";
                        echo "<span class='bg-red'></span>";
                        echo "<span class='bg-brown'></span>";
                        echo "<span class='bg-blue'></span>";
                        echo "<span class='bg-beige'></span>";
                        echo "</div>";

                        echo "<div class='actions'>";

                        if($a->qtt > 0){
                            echo "<button type='submit' onclick='panier($a->idA)'><span class='icon btn cl1 hover-cl3 brc1 bgt hover-brc3'>ù</span></button>";
                        }else{
                            echo "<button type='button' disabled><span class='icon btn cl1 hover-cl3 brc1 bgt hover-brc3'>ù</span></button>";
                        }   
                        echo "<a href='".WEBROOT.L."$a->url'' class='btn cl1 brc1 hover-brc3 hover-cl3 icon'>&#xe93d</a>";
                        echo "<button type='submit' class='". Func::isFav($a->idA, $db) ."' onclick='favorite($a->idA, this)'><span class='icon btn cl1 hover-cl3 brc1 bgt hover-brc3'>&#xe925</span></button>";
                        echo "</div>";
                        
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>

                </div>

                <div class="gla-pagination">

                    <?= $GLA->articlePaginationBtn($page); ?>

                </div>

            </div>

        
            <?php include "theme/aside/aside.php" ?>
    
        </div>

    </div>

</div>

</div>




