<?php

if (isset($_POST['submit'])) {

    if (!empty($_POST['besoin_title']) && !empty($_POST['besoin_id']) && !empty($_POST['besoin_price']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['tel']) && !empty($_POST['type'])) {

        $date_intervention = ($_POST['type'] == 2) ? $_POST['date_intervention'] : date('Y-m-d H:i:s');

        $db->query("INSERT INTO commande (besoin_title, besoin_id, besoin_price, nom, prenom, adresse, gps, tel, email, dscr, type, date_intervention, stt, platforme, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,0,'web',NOW())", [$_POST['besoin_title'], $_POST['besoin_id'], $_POST['besoin_price'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['gps'], $_POST['tel'], $_POST['email'], $_POST['dscr'], $_POST['type'], $date_intervention]);

        Func::setFlash('succes', $asset->text(111));
    } else {

        Func::setFlash('error', $asset->text(131));
    }

    Func::redirect('#flash');
}

?>

<div class="single content pt40 pb60">

    <div class="c">

        <div class="cont">

            <div class="root pt20 pb20 cl4">
                <?= $GLA->articleParents() ?>
                <a href="<?= WEBROOT . L ?>" class="cl4 hover-cl3"> <?= $asset->text(156) ?> </a> -
                <a href="<?= WEBROOT . L ?>page/services" class="cl4 hover-cl3"> <?= $asset->text(154) ?> </a>
            </div>

            <div class="first-cont flex">

                <div class="photos col-48">

                    <?php if ($GLA->articleImage() !== "") : ?>
                        <img src="<?= $GLA->articleImageFull() ?>" alt="<?= $GLA->articleTitle() ?>" class="first brc brc7" />
                    <?php endif ?>

                    <div class="more-img">

                        <?php

                        $n = 0;

                        foreach ($GLA->articleMoreImage($GLA->articleID()) as $i) {

                            $n++;

                            echo "<img src='" . $GLA->imageMoreUrl($i->nameI) . "' onclick='zoom(this,$n)' class='img-zm img-n$n brc -brc2 brc7' data-id='$n'/>";
                        }

                        ?>

                    </div>

                    <div class="desc mt50 ">

                        <h2 class="h mb20"><?= $asset->text(22) ?></h2>

                        <div class="cnt">
                            <?= $GLA->articleContent() ?>
                        </div>

                    </div>

                </div>

                <div class="ar-cont col-48 fw_none" id="flash">

                    <h1 class="h mb10"><?= $GLA->articleTitle() ?></h1>

                    <?= Func::getFlash() ?>

                    <div class="montant mb20">

                        <span class="bg3"><?= $asset->text(132) ?></span>

                        <?php if ($GLA->articlePriceMax() == 1) { ?>

                            <p><?= $asset->text(143) ?></p>

                        <?php } elseif ($GLA->articlePriceMin() == $GLA->articlePriceMax()) { ?>

                            <p><?= $GLA->articlePriceMin() ?> DA TTC</p>

                        <?php } else { ?>

                            <p><?= $asset->text(159) ?> <?= $GLA->articlePriceMin() ?> <?= $asset->text(160) ?> <?= $GLA->articlePriceMax() ?> <?= $asset->text(161) ?></p>

                        <?php } ?>

                    </div>

                    <form method="POST" class="gla-form">

                        <input type="hidden" name="besoin_title" value="<?= $GLA->articleTitle() ?>" required>
                        <input type="hidden" name="besoin_id" value="<?= $GLA->articleID() ?>" required>
                        <input type="hidden" name="besoin_price" value="<?= $GLA->articlePriceMin() ?> DA - <?= $GLA->articlePriceMax() ?> DA" required>

                        <h3 class="mb20"><span class="icon">|</span> <?= $asset->text(134) ?></h3>

                        <label><?= $asset->text(144) ?></label>
                        <input type="text" name="nom" placeholder='<?= $asset->text(144) ?> ...' required class="col-6 mb20">

                        <label><?= $asset->text(145) ?></label>
                        <input type="text" name="prenom" placeholder='<?= $asset->text(145) ?> ...' required class="col-6 mb20">

                        <label><?= $asset->text(36) ?></label>
                        <input type="text" name="adresse" placeholder='<?= $asset->text(147) ?> ...' required class="col-10 mb20">

                        <label class="mb10"><?= $asset->text(163) ?> </label>

                        <div class="mb20">

                            <span class="btn bg3 brc3" id="locationBtn" onclick="getLocation()"><?= $asset->text(164) ?></span>

                            <input type="text" name="gps" id="gps" placeholder='...' class="col-10 d_n">

                        </div>

                        <label id='coordonnees' class="cl3"></label>

                        <div id="map"></div>

                        <script>
                            function getLocation() {

                                if (navigator.geolocation) {

                                    navigator.geolocation.getCurrentPosition(showPosition, errorPosition)

                                } else {

                                    setAlert("Geolocation is not supported by this browser.", "error")

                                }

                            }

                            function showPosition(position) {

                                gps_input = document.querySelector('#gps')
                                coordonnees = document.querySelector('#coordonnees')
                                gps_input.style.display = "block"

                                gps_input.value = position.coords.latitude.toFixed(7) + "," + position.coords.longitude.toFixed(7)

                                document.querySelector('#locationBtn').style.display = "none"

                                mapBox = document.querySelector('#map')

                                mapBox.style.marginBottom = '20px'
                                
                                coordonnees.style.marginBottom = '20px'

                                coordonnees.innerHTML = 'Mes coordonnées : ' + position.coords.latitude.toFixed(7) + "," + position.coords.longitude.toFixed(7)

                                var myLatLng = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };

                                var map = new google.maps.Map(mapBox, {
                                    zoom: 17,
                                    center: myLatLng,
                                    mapTypeId: 'satellite'
                                });

                                var marker = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                    title: 'Ma Position'
                                });

                                mapBox.style.height = "300px"

                            }

                            function errorPosition(error) {

                                switch (error.code) {

                                    case error.TIMEOUT:
                                        setAlert("Timeout !", "error")
                                        break;

                                    case error.PERMISSION_DENIED:
                                        setAlert("Vous n’avez pas donné la permission pour que kiuper vous localise", "error")
                                        break;

                                    case error.POSITION_UNAVAILABLE:
                                        setAlert("Votre position n’a pu être déterminée", "error")
                                        break;

                                    case error.UNKNOWN_ERROR:
                                        setAlert("Impossible de vous localiser", "error")
                                        break;

                                }
                            }
                        </script>

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6BUiaqul-DG_reCDdCzjnJaQFP1yxQS8&callback=initMap"></script>


                        <label><?= $asset->text(14) ?></label>
                        <input type="text" name="tel" placeholder='<?= $asset->text(14) ?> ...' required class="col-4 mb20">

                        <label><?= $asset->text(148) ?></label>
                        <input type="text" name="email" placeholder='<?= $asset->text(148) ?> ...' class="col-5 mb20">

                        <label><?= $asset->text(162) ?></label>
                        <textarea name="dscr" placeholder='<?= $asset->text(162) ?> ...' class="col-8 mb20"></textarea>

                        <h3><span class="icon">|</span> <?= $asset->text(146) ?></h3>

                        <div class="p20 type_intervention">

                            <div>
                                <input type="radio" name="type" value='1' checked onchange="if(this.value == '1') document.querySelector('#date_insert').style.display='none'">
                                <span class="fz1"><?= $asset->text(149) ?></span>
                                <p class="rem"><?= $asset->text(150) ?></p>
                            </div>

                            <div class="flex jc-start ai-center">
                                <input type="radio" name="type" value='2' class="mr10" onchange="if(this.value == '2') document.querySelector('#date_insert').style.display='block'">
                                <span class="fz1"><?= $asset->text(151) ?></span>
                            </div>

                        </div>

                        <div id="date_insert">

                            <label><?= $asset->text(152) ?></label>
                            <input type="datetime-local" name="date_intervention" class="col-4">

                        </div>

                        <div class="p20 type_intervention">

                            <div>
                                <input type="checkbox" name="conditions" required>
                                <p><?= $asset->text(153) ?> <a href='<?= WEBROOT . L ?>page/conditions-generale-d-utilisation'><?= $asset->text(142) ?></a></p>
                            </div>

                        </div>

                        <input type="submit" name='submit' value="<?= $asset->text(135) ?>" class="btn bg3 cl1 brc3">

                    </form>

                    <div class="bg7 p20 fz09">

                        <span class="cl2 d-block mb3"><span class="icon mr8 fz11">&#xe935</span><?= $asset->text(154) ?></span>
                        <span class="cl4 d-block mb5"><?= $asset->text(136) ?></span>
                        <span class="cl2 d-block mb3"><span class="icon mr8 fz11">&#xe95f</span><?= $asset->text(155) ?></span>
                        <span class="cl4 d-block mb10"><?= $asset->text(137) ?></span>

                    </div>

                    <div class="shar f mt20">

                        <span><?= $asset->text(20) ?> <strong><?= $GLA->articleTitle() ?></strong> <?= $asset->text(21) ?></span>

                        <div class="pt20">
                            <span class="icon fb shr mr5 fz11 btn bg3 brc3" data-n="fb">Y</span>
                            <span class="icon tw shr mr5 fz11 btn bg3 brc3" data-n="tw">+</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="<?= Func::cache('theme/assets/js/single.js') ?>"></script>

</div>