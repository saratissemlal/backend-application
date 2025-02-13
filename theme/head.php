<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, userscalable=no, targetdensitydpi=device-dpi">
    <?= $GLA->getMeta() ?>

    <link rel="stylesheet" href="<?= Func::cache('theme/assets/css/style.css') ?>" />
    <link rel="stylesheet" href="<?= Func::cache('theme/assets/css/base.css') ?>" />
    <link rel="stylesheet" href="<?= Func::cache('theme/assets/css/mobile.css') ?>" media="screen and (max-width: 960px)" type="text/css" />
    <link rel="icon" href="<?= Func::cache('theme/assets/img/large/' . $asset->pic(2)) ?>">
    <script src="<?= Func::cache('theme/assets/js/script.js') ?>"></script>

    <?= $GLA->siteAnalytics() ?>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FB509HT2BB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FB509HT2BB');
    </script>

    <?php

        if(L !== ''){

            echo "<style>*{text-align:right}.flex{flex-direction: row-reverse}.ml20, .mr20{margin-left: 20px;margin-right: 20px}</style>";

        }

    ?>

</head>

<body>

    <header class="bg1">

        <div class="tophead flex c">

            <p class="fz1"><span class="icon">G</span><span><?= $GLA->siteEmail() ?></span></p>

            <div class="flex ai-center">
                <a href="<?= $GLA->sitePageFacebook() ?>" target='_blank' class="cl4"><span class="icon">Y</span></a>
                <a href="<?= $GLA->sitePageInstagram() ?>" target='_blank' class="cl4"><span class="icon">&#xe902</span></a>
                <a href="<?= $GLA->sitePageKiuper() ?>" target='_blank' class="cl4"><span class="icon">&#xe909</span></a>
                <a href="<?= $GLA->sitePageYoutube() ?>" target='_blank' class="cl4"><span class="icon">&#xe906</span></a>
                <a href="<?= WEBROOT . trim(str_replace(['ar/', 'fr/'], '', $_SERVER['REQUEST_URI']), '/') ?>" class="cl4">Français</a>
                <a href="<?= WEBROOT . 'ar/' . trim(str_replace(['ar/', 'fr/'], '', $_SERVER['REQUEST_URI']), '/') ?>" class="cl4 ml20">العربية</a>
            </div>

        </div>

        <div class="head c flex ai-center">

            <form action="<?= WEBROOT.L ?>search/query" method="GET" class="col-3">

                <input type="submit" value="w" class="icon cl2" />
                <input class="cl2 col-8" type="search" name="s" placeholder="<?= $asset->text(19) ?>" <?php if (!empty($_GET['s'])) echo "value=\"" . $_GET['s'] . "\"" ?> />

            </form>

            <a href="<?= WEBROOT.L ?>" title="<?= $GLA->siteName() ?>"><img src="<?= Func::cache("theme/assets/img/large/" . $asset->pic(1)) ?>" alt="<?= $GLA->siteName() ?>" class="logo" /></a>

            <div class="flex col-4 flex-end m_d_inb_mb">

                <a href="<?= WEBROOT.L ?>page/contact" class="btn cl2 brc12 hover-bg3 mr20"><span class="icon">G</span> <?= $asset->text(11) ?></a>
                <a href="tel:<?= $GLA->siteTele() ?>" class="btn bg3 cl2 brc3"><span class="icon">x</span> <?= $asset->text(130) ?></a>

            </div>

        </div>

        <span class="menu-res icon bg3" onclick="body.classList.toggle('mn');">b</span>

        <nav class="bg2">

            <div class="c">

                <?= $GLA->getMenu() ?>

            </div>

        </nav>

    </header>