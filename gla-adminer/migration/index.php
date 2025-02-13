<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    $db->query("CREATE TABLE partenaires ( `idP` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(256) NOT NULL , `image` VARCHAR(64) NOT NULL , `date` INT NOT NULL , PRIMARY KEY (`idP`)) ENGINE = MyISAM;");

    echo 'done';

}else{

    Func::redirect('../');

}