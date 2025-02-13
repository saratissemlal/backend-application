<?php

class Func{

    static function isSession(){if(isset($_SESSION['gla-adminer']) && $_SESSION['gla-adminer'] == 'gla-adminer')return true;}

    static function setFlash($type, $msg){
        $_SESSION['notification']['type'] = $type;
        $_SESSION['notification']['msg'] = $msg;
    }

    static function getFlash(){
        if (isset($_SESSION['notification']['type']) && isset($_SESSION['notification']['msg'])) {
            $type = $_SESSION['notification']['type'];
            $msg = $_SESSION['notification']['msg'];
            $_SESSION['notification'] = array();
            return "<p class=\"$type\">$msg</p>";
        }
    }

    static function redirect($p){
        header("Location:$p");exit();
    }

    static function _404(){
        header("Location:".WEBROOT."404");exit();
    }

    static function cache($f){
        $file = $_SERVER['DOCUMENT_ROOT'].Config::get('folder')."$f";
        return WEBROOT.$f."?".filemtime($file);
    }

    static function session($r = false){

        if(isset($_SESSION['session']) && isset($_SESSION['id']) && is_numeric($_SESSION['id'])){

            return true;

        }else{

            if($r){

                header('location:'.$r);
                exit();

            }

        }

    }

    static function profilePhoto($p, $class = 'av mr10 bg3'){

        if(!empty($p)){

            return "<img src='".self::cache('theme/assets/img/profile/' . $p)."' class='$class' id='avatar'>";

        }else{

            return "<div class='$class p5'><img src='".WEBROOT."theme/assets/img/default-avatar.png' class='def' id='avatar'></div>";

        }

    }

    static function isFav($id, $db){

        if(!isset($_SESSION['id'])) return false;

        $fav = $db->select('idF', 'favorite')->where("prod = {$id} AND user = {$_SESSION['id']}")->find();

        if(!empty($fav->idF)) return 'isfav';

    }

    static function value($name, $type = false){
        if(isset($_POST[$name])){
            if($type){
                echo $_POST[$name];
            }else{
                echo "value=\"{$_POST[$name]}\"";
            }
        }
    }

    static function execute($url){

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl,  CURLOPT_RETURNTRANSFER, true);

        curl_exec($curl);

        curl_close($curl);

    }

    static function time($t){
        $rt = time() - $t;

        $mn = 60;
        $h = 3600;
        $d = 86400;
        $m = 2592000;
        $y = 31536000;

        if($rt <= $mn){
            return "Moins d'une minute";
        }elseif($rt > $mn && $rt < $h){
            $rtt = round($rt/$mn);
            return "$rtt minutes";
        }elseif($rt > $h && $rt < $d){
            $rtt = round($rt/$h);
            return "$rtt heurs";
        }elseif($rt > $d && $rt < $m){
            $rtt = round($rt/$d);
            return "$rtt jours";
        }elseif($rt > $m && $rt < $y){
            $rtt = round($rt/$m);
            return "$rtt mois";
        }else{
            $rtt = round($rt/$y);
            return "$rtt ans";
        }
    }

    static function ville($i = false){

        $wilaya = [
                1 => 'Adrar',
                2 => 'Chlef',
                3 => 'Laghouat',
                4 => 'Oum El Bouaghi',
                5 => 'Batna',
                6 => 'Béjaïa',
                7 => 'Biskra',
                8 => 'Béchar',
                9 => 'Blida',
                10 => 'Bouira',
                11 => 'Tamanrasset',
                12 => 'Tébessa',
                13 => 'Tlemcen',
                14 => 'Tiaret',
                15 => 'Tizi Ouzou',
                16 => 'Alger',
                17 => 'Djelfa',
                18 => 'Jijel',
                19 => 'Sétif',
                20 => 'Saïda',
                21 => 'Skikda',
                22 => 'Sidi Bel Abbès',
                23 => 'Annaba',
                24 => 'Guelma',
                25 => 'Constantine',
                26 => 'Médéa',
                27 => 'Mostaganem',
                28 => "M'Sila",
                29 => 'Mascara',
                30 => 'Ouargla',
                31 => 'Oran',
                32 => 'El Bayadh',
                33 => 'Illizi',
                34 => 'Bordj Bou Arreridj',
                35 => 'Boumerdès',
                36 => 'El Tarf',
                37 => 'Tindouf',
                38 => 'Tissemsilt',
                39 => 'El Oued',
                40 => 'Khenchela',
                41 => 'Souk Ahras',
                42 => 'Tipaza',
                43 => 'Mila',
                44 => 'Aïn Defla',
                45 => 'Naâma',
                46 => 'Aïn Témouchent',
                47 => 'Ghardaïa',
                48 => 'Relizane'
        ];

        if($i){

          if(is_numeric($i)){

            if(1 <= $i && $i <= 48) return $wilaya[$i];

          }else{

            return $i;

          }

          return 'Algeria';

        }else{

          return $wilaya;

        }

    }

}
