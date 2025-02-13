<h2 class="mb10">Notifications</h2>

<div class="notif">

    <?php

    $notif = new \Recuperation\Notif\Notification($db);

    $notif->scanArticles();

    ?>

</div>

<p class="rem"><span class="icon">`</span> La description c'est les 230 premiers carractères du contenu de l'article. c'est la partie de l'article qui sera affiché sur les moteurs de recherche.</p>