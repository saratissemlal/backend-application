<?php require "../../../gla-adminer/core/coreAjax.php";

if (isset($_POST['value'])) {

    $db = BDD\App::getBDD();

    $prod = $db->query("SELECT title,url FROM articles WHERE parent = ? ORDER BY idA DESC", [$_POST['value']])->fetchAll();

    $return = '<option value="" selected disabled hidden>Sélectionner un besoin</option>';

    foreach ($prod as $v) {

        $return .= "<option value='$v->url'>$v->title</option>";

    }

    $empty = (empty($prod)) ? true : false;

    echo json_encode([
        'return' => $return,
        'empty' => $empty
    ]);

}
