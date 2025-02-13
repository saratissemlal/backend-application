<?php

class Theme {

    private $info;
    private $db;
    private $css;

    public function __construct($db){

        $this->db = $db;
        $this->info = $this->getInfo();
        $this->css = $this->css();

    }

    public function getInfo(){

        return $this->db->query("SELECT * FROM theme")->fetch();

    }

    public function get($var){

        return $this->info->$var;

    }

    public function css(){

        ob_start();

        ?>
        .hover-cl1:hover,.cl1{color:<?= $this->get('c1') ?>}.bg1,.hover-bg1:hover{background-color:<?= $this->get('c1') ?>}
        .hover-cl2:hover,.cl2{color:<?= $this->get('c2') ?>}.bg2,.hover-bg2:hover{background-color:<?= $this->get('c2') ?>}
        .hover-cl3:hover,.cl3{color:<?= $this->get('c3') ?>}.bg3,.hover-bg3:hover{background-color:<?= $this->get('c3') ?>}
        .hover-cl4:hover,.cl4{color:<?= $this->get('c4') ?>}.bg4,.hover-bg4:hover{background-color:<?= $this->get('c4') ?>}
        .hover-cl5:hover,.cl5{color:<?= $this->get('c5') ?>}.bg5,.hover-bg5:hover{background-color:<?= $this->get('c5') ?>}
        .hover-cl6:hover,.cl6{color:<?= $this->get('c6') ?>}.bg6,.hover-bg6:hover{background-color:<?= $this->get('c6') ?>}
        .hover-cl7:hover,.cl7{color:<?= $this->get('c7') ?>}.bg7,.hover-bg7:hover{background-color:<?= $this->get('c7') ?>}
        .hover-cl8:hover,.cl8{color:<?= $this->get('c8') ?>}.bg8,.hover-bg8:hover{background-color:<?= $this->get('c8') ?>}
        .hover-cl9:hover,.cl9{color:<?= $this->get('c9') ?>}.bg9,.hover-bg9:hover{background-color:<?= $this->get('c9') ?>}
        .hover-cl10:hover,.cl10{color:<?= $this->get('c10') ?>}.bg10,.hover-bg10:hover{background-color:<?= $this->get('c10') ?>}

        .bgt,hover-bgt:hover{background-color:transparent}

        .hover-brc1:hover,.brc1{border-color:<?= $this->get('c1') ?>}
        .hover-brc2:hover,.brc2{border-color:<?= $this->get('c2') ?>}
        .hover-brc3:hover,.brc3{border-color:<?= $this->get('c3') ?>}
        .hover-brc4:hover,.brc4{border-color:<?= $this->get('c4') ?>}
        .hover-brc5:hover,.brc5{border-color:<?= $this->get('c5') ?>}
        .hover-brc6:hover,.brc6{border-color:<?= $this->get('c6') ?>}
        .hover-brc7:hover,.brc7{border-color:<?= $this->get('c7') ?>}
        .hover-brc8:hover,.brc8{border-color:<?= $this->get('c8') ?>}
        .hover-brc9:hover,.brc9{border-color:<?= $this->get('c9') ?>}
        .hover-brc10:hover,.brc10{border-color:<?= $this->get('c10') ?>}

        .flex{display:flex;justify-content: space-between}
        .flex-end{display:flex;justify-content: flex-end}
        .flex-start{display:flex;justify-content: flex-start}
        .grid2{display:grid;grid-template-columns: repeat(2, calc( 50% - 15px ) [col-start]);grid-column-gap:20px}
        .grid3{display:grid;grid-template-columns: repeat(3, calc( calc(100% / 3) - 15px )[col-start]);grid-column-gap:20px}
        .grid4{display:grid;grid-template-columns: repeat(4, calc( 25% - 15px ) [col-start]);grid-column-gap:20px}
        .grid5{display:grid;grid-template-columns: repeat(5, calc( 20% - 15px ) [col-start]);grid-column-gap:20px}

        .fz07{font-size: .7em}
        .fz09{font-size: .9em}
        .fz11{font-size: 1.1em}
        .fz1{font-size: 1.5em}
        .fz2{font-size: 2em}
        .fz3{font-size: 3em}
        .fz4{font-size: 4em}
        .fz5{font-size: 5em}

        .p0{padding: 0}
        .p5{padding: 5px}
        .p10{padding: 10px}
        .p20{padding: 20px}
        .p30{padding: 30px}
        .p40{padding: 40px}
        .p50{padding: 50px}
        .p60{padding: 60px}
        .p70{padding: 70px}
        .p80{padding: 80px}

        .pt10{padding-top: 10px}
        .pt20{padding-top: 20px}
        .pt30{padding-top: 30px}
        .pt40{padding-top: 40px}
        .pt50{padding-top: 50px}
        .pt60{padding-top: 60px}
        .pt70{padding-top: 70px}
        .pt80{padding-top: 80px}
        .pt90{padding-top: 90px}
        .pt100{padding-top: 100px}

        .pb10{padding-bottom: 10px}
        .pb20{padding-bottom: 20px}
        .pb30{padding-bottom: 30px}
        .pb40{padding-bottom: 40px}
        .pb50{padding-bottom: 50px}
        .pb60{padding-bottom: 60px}
        .pb70{padding-bottom: 70px}
        .pb80{padding-bottom: 80px}
        .pb90{padding-bottom: 90px}
        .pb100{padding-bottom: 100px}
        .pb200{padding-bottom: 200px}

        .mb0{margin-bottom: 0!important}
        .mb3{margin-bottom: 3px}
        .mb5{margin-bottom: 5px}
        .mb10{margin-bottom: 10px}
        .mb20{margin-bottom: 20px}
        .mb30{margin-bottom: 30px}
        .mb40{margin-bottom: 40px}
        .mb50{margin-bottom: 50px}
        .mb60{margin-bottom: 60px}
        .mb70{margin-bottom: 70px}
        .mb80{margin-bottom: 80px}

        .mt10{margin-top: 20px}
        .mt20{margin-top: 20px}
        .mt30{margin-top: 30px}
        .mt40{margin-top: 40px}
        .mt50{margin-top: 50px}
        .mt60{margin-top: 60px}
        .mt70{margin-top: 70px}
        .mt80{margin-top: 80px}

        .ml5{margin-left: 5px}
        .ml8{margin-left: 8px}
        .ml10{margin-left: 10px}
        .ml20{margin-left: 20px}
        .ml30{margin-left: 30px}
        .ml40{margin-left: 40px}
        .ml50{margin-left: 50px}
        .ml60{margin-left: 60px}
        .ml70{margin-left: 70px}


        .mr5{margin-right: 5px}
        .mr8{margin-right: 8px}
        .mr10{margin-right: 10px}
        .mr20{margin-right: 20px}
        .mr30{margin-right: 30px}
        .mr40{margin-right: 40px}
        .mr50{margin-right: 50px}

        .m0a{margin:0 auto}

        .ta-center{text-align: center}
        .ta-end{text-align: end}
        .ta-start{text-align: start}

        .ai-start{align-items: start}
        .ai-center{align-items: center}
        .ac-center{align-content: center}

        .jc-start{justify-content:flex-start}
        .jc-end{justify-content:flex-end}
        .jc-between{justify-content:space-between}
        .jc-around{justify-content:space-around}
        .jc-center{justify-content:center}

        .d-block{display:block}
        .d-in-block{display:inline-block}

        .col-1{width:10%}
        .col-2{width:20%}
        .col-22{width:22%}
        .col-25{width:25%}
        .col-28{width:28%}
        .col-3{width:30%}
        .col-32{width:32%}
        .col-38{width:38%}
        .col-48{width: 48%}
        .col-4{width:40%}
        .col-5{width:50%}
        .col-58{width:58%}
        .col-59{width:59%}
        .col-6{width:60%}
        .col-68{width:68%}
        .col-7{width:70%}
        .col-78{width:78%}
        .col-8{width:80%}
        .col-9{width:90%}
        .col-10{width:100%}

        @media (max-width : 960px) {

        header, footer, .c, .col-1, .col-25, .col-2, .col-3, .col-4, .col-48, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10{width: 100% !important;display: block}

        }


        /* ---------- Custom Style -------------*/
        header nav li a:hover{color: <?= $this->get('c3') ?>}
        header nav ul ul{background-color:<?= $this->get('c3')?>}
        header nav ul ul a{color:<?= $this->get('c2')?>}
        header nav ul ul a:hover{color:<?= $this->get('c1')?>}
        .head form input[type=search]::placeholder {color: <?= $this->get('c2') ?>;opacity: 1}
        .head form input[type=search]:-ms-input-placeholder {color: <?= $this->get('c2') ?>}
        .head form input[type=search]::-ms-input-placeholder {color: <?= $this->get('c2') ?>}
        .caroussel .masq h1:after{background-color:<?= $this->get('c2') ?>}
        .c5 .col-3 div,.cat_head div{background-color:<?= $this->get('c3') . "d0"?>}
        .mask .exit, .mask .btn{background-color:<?= $this->get('c3')?>;border-color:<?= $this->get('c3')?>;color:<?= $this->get('c2')?>}

        /* ------- Scroll Anim ---------- */

        .reveal-loaded .fade{
        opacity: 0;
        transform: translateY(50px);
        transition: .8s ease;
        }

        .reveal-loaded .fade.anim_left{
        transform: translateX(50px);
        }

        .reveal-loaded .fade.anim_circle{
        transform: scale(0.1);
        }

        .reveal-loaded .fade_in{
        opacity: 1;
        transform: translateY(0)
        }

        .reveal-loaded .anim_left.fade_in{
        transform: translateX(0);
        }

        .reveal-loaded .anim_circle.fade_in{
        transform: scale(1);
        }
        <?php

        return ob_get_clean();

    }

    public function save($file){

        $this->css();

        file_put_contents($file,$this->css);

    }

} 