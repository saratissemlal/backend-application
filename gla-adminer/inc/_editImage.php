<div class="links box">
    <h1 class="mb20">Modifier Image</h1>

    <?= Func::getFlash() ?>

    <div class="clear"></div>
    
        <div class="left galerie">

            <?php

            if(empty($_GET['img'])){
                $image = \Recuperation\Admin::getArticleImageById($_GET['id'], $db);
            }else{
                $image = $_GET['img'];
            }

            ?>

            <img src="<?= Func::cache("gla-adminer/uploads/article/full/".$image )?>" class="w100"/>

        </div>

        <div class="right">

            <div class="mb20">
                <label>Modifier l'image</label>
                <input type="file" name="image" id="imgFile"/>
                <input type="hidden" name="imagenom" id="imgName" value="<?= $_GET['img'] ?>"/>
                <input type="hidden" name="article_id" id="article_id" value="<?= $_GET['id'] ?>"/>

                <p class="rem">Si vous modifiez cette image, l'article au quel cette image est attribuer seras modifier automatiquemnt</p>
            </div>

            <div class="mb10">

                <div class="load-box" id="loadBox">
                    <img src="<?= Func::cache('gla-adminer/assets/image/loader.gif') ?>" class="loader"/>
                    <span class="l-prc">0 %</span>
                </div>

                <button type="submit" name="submit" class="btn b-g" id="btnLoad" onclick="editImg()"><span class="icon">W</span> Modifier</button>
                <a href="<?= WEBROOT ?>gla-adminer/action/edit/article.php?id=<?= $_GET['id'] ?>" class="btn b-b">Retoure à l'article parent</a>
                
            </div>

        </div>

    </form>

    <div class="clear"></div>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>
