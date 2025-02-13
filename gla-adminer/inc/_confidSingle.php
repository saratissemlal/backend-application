<div class="links box">
    <h1>Config</h1>
</div>

<?= Func::getFlash() ?>

<div class="box">

    <h2 class="mb10">Client</h2>

    <p><strong>Nom</strong> : <?= $user->nom ?></p>
    <p><strong>Adresse</strong> : <?= $user->adresse ?></p>
    <p><strong>Email</strong> : <?= $user->email ?></p>
    <p class="mb20"><strong>Téléphone</strong> : <?= $user->tele ?></p>

    <p><strong>Message</strong> : <?= $config->message ?></p>
    <p><strong>Prix total de la config</strong> : <?= number_format($config->total, 0, '', ' ') ." DA" ?></p>

</div>

<div class="box">

    <table id="gla-table">

        <tr class="tbody header">
            <th>Matériel</th>
            <th>Produit</th>
            <th>Prix</th>
            <th>Image</th>
            <th>Quantité</th>
        </tr>

        <tr>
            <td>Boitier</td>
            <?= \Recuperation\Panier::getHard($config->boitier, $db) ?>
        </tr>

        <tr>
            <td>Processeur</td>
            <?= \Recuperation\Panier::getHard($config->processeur, $db) ?>
        </tr>

        <tr>
            <td>Carte Mere</td>
            <?= \Recuperation\Panier::getHard($config->carte_mere, $db) ?>
        </tr>

        <tr>
            <td>RAM</td>
            <?= \Recuperation\Panier::getHard($config->ram, $db) ?>
        </tr>

        <tr>
            <td>Carte Graphique</td>
            <?= \Recuperation\Panier::getHard($config->carte_graphique, $db) ?>
        </tr>

        <tr>
            <td>Bloc</td>
            <?= \Recuperation\Panier::getHard($config->bloc, $db) ?>
        </tr>

        <tr>
            <td>Disque Dur</td>
            <?= \Recuperation\Panier::getHard($config->disque_dur, $db) ?>
        </tr>

        <tr>
            <td>Lecteur</td>
            <?= \Recuperation\Panier::getHard($config->lecteur, $db) ?>
        </tr>

        <tr>
            <td>Clavier</td>
            <?= \Recuperation\Panier::getHard($config->clavier, $db) ?>
        </tr>

        <tr>
            <td>Souris</td>
            <?= \Recuperation\Panier::getHard($config->souris, $db) ?>
        </tr>

        <tr style="background: #ccc">
            <td><strong>Total</strong></td>
            <td></td>
            <td><strong><?= number_format($config->total, 0, '', ' ') ." DA" ?></strong></td>
            <td></td>
            <td></td>
        </tr>

    </table>

</div>