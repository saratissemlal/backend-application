<div class="links box">
    <h1>Paramètres</h1>

    <a href="history.php" class="btn b-gr"><span class="icon">t</span> Historique de connexion</a>
</div>

<?= Func::getFlash() ?>

<div class="box">

    <form action="" method="POST">
        <div class="left">
            <h2 class="mb20">Modifier Mot de passe</h2>


            <div>
                <label>Mot de passe acctuel</label>
                <input type="password" name="nowPass" placeholder="Votre mot de passe ..."/>
            </div>

        </div>

        <div class="right">

            <h3 class="mb20">Nouveau mot de passe</h3>

            <div class="mb10">
                <label>Nouveau mot de passe</label>
                <input type="password" name="newPass" placeholder="Votre nouveau mot de passe ..."/>
            </div>

            <div class="mb20">
                <label>Retappez le nouveau mot de passe</label>
                <input type="password" name="rNewPass" placeholder="Retappez nouveau mot de passe ..."/>
            </div>

            <div>
                <button type="submit" name="submit" class="btn b-g"><span class="icon">W</span> Enregistrer</button>
            </div>
        </div>

    </form>
    <div class="clear"></div>
</div>

