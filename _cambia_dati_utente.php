<?php
require('_config_inc.php');
require_once('_db_dal_inc.php');

$user=$_GET['user'];
$email=$_GET['email'];
$bio=$_GET['bio'];
$psw=$_GET['psw'];

$conn=db_connect();

$sql="UPDATE `utente` SET `email`='$email',`bio`='$bio' WHERE password='$psw'";

if($conn->query($sql)==true)
echo "Dati cambiati con successo!!!"

?>