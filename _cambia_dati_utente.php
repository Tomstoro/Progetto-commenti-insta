<?php
require('_config_inc.php');
require_once('_db_dal_inc.php');

$email=$_GET['email'];
$bio=$_GET['bio'];
$user=$_GET['user'];

$conn=db_connect();

$sql="UPDATE `utente` SET `email`='$email',`bio`='$bio' WHERE user='$user'";

if($conn->query($sql)==true)
echo "Dati cambiati con successo!!!"

?>
<br>
<a href="profilo.php?user=<?=$user?>">Torna al profilo</a>
<?php  ?>