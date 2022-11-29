<?php
if(array_key_exists('user',$_GET))
    $user=$_GET['user'];

require_once('_db_dal_inc.php');
$conn=db_connect();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profilo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stileprofilo.css">
    </head>
    <body>
    
    <?php /*NAVBAR SINISTRA CON LINK ALLE PAGINE*/?>
    <div id="left-navbar"> 
    <a href="home.php?user=<?=$user?>"><img src="images/home_logo.png" alt="home" width="120px" height="120px" title="HOME"></a>
    <a href="#"><img src="images/cerca_logo.png" alt="cerca" width="65px" height="65px" title="CERCA"></a>
    

    <?php /*DISPLAY DELL'IMMAGINE PROFILO DAL DB*/?>
    <a href="profilo.php?user=<?=$user?>" title="PROFILO">  
    <?php $sql = "SELECT Pro_pic FROM utente WHERE user = '$user'";
    $sth = $conn->query($sql);
    $result=mysqli_fetch_array($sth);
    if($result['Pro_pic']!=null)
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['Pro_pic'] ).'" id="pro_pic"/>'; 
    ?>
    </a>
    

    <?php /*FORM PER CAMBIARE FOTO PROFILO*/?>
    <form action="_upload.php" method="post" enctype="multipart/form-data" id="upload">
    <label>CAMBIA IMMAGINE PROFILO:</label> <br> <br>
    <input type="file" name="image" title="File da caricare"> <br> <br>
    <input type="text" name="user" value="<?=$user?>" hidden>
    <input type="submit" name="submit" value="Cambia foto profilo" title="Cambia">
    </form>
    </div>

    <div id="dati_utente">
        <?php require('_display_info_utente.php')?>
    </div>
    </body>
</html>
<? $conn->close();?>