<?php

require_once('_db_dal_inc.php');
$conn=db_connect();


$user=$_GET['user'];
$idP=intval($_GET['idP']);
$contenuto=$_GET['new_commento'];

add_commento($conn,$user,$idP,$contenuto);

?>

<a href="home.php?user=<?=$user?>">Torna alla home</a>