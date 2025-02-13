<div class="box t_color">
    <h1 class="mb20">Article style</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
    <div class="left">

        <div class="mb10">
            <label>Style d'affichage des articles</label>
            <select name="a_style">
                <option value="box" <?php if($theme->a_style == 'box') echo "selected" ?>>Box</option>
                <option value="list" <?php if($theme->a_style == 'list') echo "selected" ?>>Liste</option>
            </select>
        </div>

        <p class="rem mb20">Les articles / produits s'afficheront comme box ou liste dans l'accueil et les catégories.</p>

        <div class="mb10">
            <label>Comebien d'article à afficher dans une <strong>ligne</strong></label>

            <select name="a_w">
                <option value="100" <?php if($theme->a_w == '100') echo "selected" ?>>1</option>
                <option value="48" <?php if($theme->a_w == '48') echo "selected" ?>>2</option>
                <option value="32" <?php if($theme->a_w == '32') echo "selected" ?>>3</option>
                <option value="24" <?php if($theme->a_w == '24') echo "selected" ?>>4</option>
                <option value="20" <?php if($theme->a_w == '20') echo "selected" ?>>5.5</option>
                <option value="19" <?php if($theme->a_w == '19') echo "selected" ?>>5</option>
                <option value="15" <?php if($theme->a_w == '15') echo "selected" ?>>6</option>
                <option value="13" <?php if($theme->a_w == '13') echo "selected" ?>>7</option>
            </select>
        </div>

        <div class="mb10">
            <label>Comebien d'article à afficher dans une <strong>page</strong></label>

            <select name="a_pp">
                <option value="6" <?php if($theme->a_pp == '6') echo "selected" ?>>6</option>
                <option value="8"b   <?php if($theme->a_pp == '8') echo "selected" ?>>8</option>
                <option value="9" <?php if($theme->a_pp == '9') echo "selected" ?>>9</option>
                <option value="12" <?php if($theme->a_pp == '12') echo "selected" ?>>12</option>
                <option value="15" <?php if($theme->a_pp == '15') echo "selected" ?>>15</option>
                <option value="16" <?php if($theme->a_pp == '16') echo "selected" ?>>16</option>
                <option value="18" <?php if($theme->a_pp == '18') echo "selected" ?>>18</option>
            </select>
        </div>

    </div>

    <div class="right">

        <div>
            <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
        </div>
    </div>

    </form>
    <div class="clear"></div>
</div>
