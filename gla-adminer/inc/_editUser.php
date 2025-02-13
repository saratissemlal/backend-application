<?php

$tele_val = ($user->tele_val == 0) ? "<span class='green'>Validé</span>" : "";
$email_val = ($user->email_val == 0) ? "<span class='green'>Validé</span>" : "";

?>

<div class="links box">
    <h1 class="mb20">Modifier l'utilisateur : <?= $user->nom ?> </h1>

    <?= Func::getFlash() ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="left">

            <div class="mb10">
                <label>Nom</label>
                <input type="text" name="nom" placeholder="Nom" value="<?= $user->nom ?>" spellcheck="true"/>
            </div>

            <div class="mb20">

                <label for="">
                    Wilaya
                    <select name="wilaya" required="true">

                        <?php

                        foreach (Func::ville() AS $k => $v) {

                            $selected = ($user->wilaya == $k) ? "selected" : "";

                            echo "<option value='$k' $selected>$v</option>";
                        }

                        ?>

                    </select>
                </label>

            </div>

            <div class="mb10">
                <label>Adresse</label>
                <input type="text" name="adresse" placeholder="Adresse" value="<?= $user->adresse ?>" spellcheck="true"/>
            </div>

        </div>

        <div class="right">

            <div class="mb10">
                <label>Email <?= $email_val ?></label>
                <input type="text" name="email" placeholder="Email" value="<?= $user->email ?>" spellcheck="true"/>
            </div>

            <div class="mb10">
                <label>Téléphone <?= $tele_val ?></label>
                <input type="text" name="tele" placeholder="Téléphone" value="<?= $user->tele ?>" spellcheck="true"/>
            </div>

            <button type="submit" name="submit" class="btn b-g" id="btnLoad"><span class="icon">W</span> Enregistrer</button>

        </div>


    </form>

    <div class="clear"></div>

</div>

<script src="<?= Func::cache('gla-adminer/assets/js/gla-script.js') ?>"></script>
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#content',
        height: 500,
        theme: 'modern',
        mobile: { theme: 'mobile' },
        menubar: false,
        plugins: [
            'advlist autolink lists link image imagetools charmap print preview anchor media table contextmenu paste wordcount code'
        ],
        toolbar: 'insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code'
    });
</script>
