<aside class="col-2 bg7 p20">

    <span class="h mb20 mt20 d-block">Nos services</span>

    <?php
        foreach ($GLA->categorieNoParent(9) as $c) {
            echo "<a href='".WEBROOT."categorie/".$c->url."' class='cl2 hover-cl3'><span class='icon'>=</span>".$c->name."</a>";            
        }
    ?>


    
</aside>