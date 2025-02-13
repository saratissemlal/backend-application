<?php require "../../../gla-adminer/core/coreAjax.php";

if (isset($_POST['value'])) {

    $db = BDD\App::getBDD();

    $prod = $db->query("SELECT idA,title FROM articles WHERE (categorie = :catID OR categorie IN (SELECT idC FROM categories WHERE parent = :catID)) ORDER BY idA DESC", ['catID' => $_POST['value']])->fetchAll();

    $return = '<option value="" selected disabled hidden>Sélectionner un problème</option>';

    foreach ($prod as $v) {

        $return .= "<option value='$v->idA'>$v->title</option>";

    }

    $empty = (empty($prod)) ? true : false;

    echo json_encode([
        'return' => $return,
        'empty' => $empty
        ]);

}
