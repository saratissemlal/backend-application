<div class="box t_color">
    <h1 class="mb20">Formulaire de commentaires</h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST">
    <div class="left">

        <div class="mb10">
            <label>Formulaire de commentaire à afficher</label>
            <select name="c_form">
                <option value="gla" <?php if($theme->c_form == 'gla') echo "selected" ?>>GLA Adminer</option>
                <option value="fb" <?php if($theme->c_form == 'fb') echo "selected" ?>>Facebook</option>
                <option value="gp" <?php if($theme->c_form == 'gp') echo "selected" ?>>Google +</option>
                <option value="no" <?php if($theme->c_form == 'no') echo "selected" ?>>Pas de commentaires</option>
            </select>
        </div>

        <p class="rem mb20">Le formulaire sélectionné sera le formulaire qui sera affiché sur les articles (pour les commentaires)</p>

        <div class="mb10">
            <label>Nombre de commentaires à affiché</label>
            <input type="number"  name="c_nbr" placeholder="Nombre de commentaires" max="100" min="10" required="true" value="<?= $theme->c_nbr ?>"/>
        </div>

        <div class="mb10">
            <label>Longueur du formulaire ( Pixels )</label>
            <input type="number"  name="c_wt" placeholder="Longueur du formulaire" max="1200" min="280" required="true" value="<?= $theme->c_wt ?>"/>
        </div>

    </div>

    <div class="right">

        <h2 class="mb20">Messages</h2>

        <div class="mb10">
            <label>Formulaire incomplet</label>
            <input type="text" name="n_cmpl" placeholder="Formulaire incomplet ..." value="<?= $com->n_cmpl ?>" required="true"/>
        </div>

        <div class="mb10">
            <label>Vérification du captcha</label>
            <input type="text" name="c_vrf" placeholder="Vérification du captcha ..." value="<?= $com->c_vrf ?>" required="true"/>
        </div>

        <div class="mb10">
            <label>Commentaire posté avec succés</label>
            <input type="text" name="c_p" placeholder="Commentaire posté avec succés ..." value="<?= $com->c_p ?>" required="true"/>
        </div>

        <div class="mb10">
            <label>Erreur, commentaire non envoyé</label>
            <input type="text" name="c_er" placeholder="Erreur, commentaire non envoyé ..." value="<?= $com->c_er ?>" required="true"/>
        </div>

        <div>
            <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
        </div>
    </div>

    </form>
    <div class="clear"></div>
</div>
