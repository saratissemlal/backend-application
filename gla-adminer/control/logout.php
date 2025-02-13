<?php include "../core/coreAdmin.php";

$db->query("DELETE FROM remember WHERE user = ?",[$_SESSION['name']]);
setcookie('GLA118','',time()-3600,'/');

$_SESSION = [];
session_destroy();

header('location:../');exit();