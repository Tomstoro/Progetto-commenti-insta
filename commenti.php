<?php
    if(array_key_exists('idP',$_GET))
    $idP=intval($_GET['idP']);
    $user=$_GET['user'];

require_once('_db_dal_inc.php');
$conn=db_connect();
?>

<?php
$sql= "SELECT  c.user as user , c.contenuto as contenuto, c.mipiace as mipiace , u.Pro_pic as Pro_pic from commento c 
inner join utente u 
on u.user=c.user 
where idP='$idP'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stilecommenti.css">
    </head>
    <body>
    <div id="left-navbar">
    <a href="home.php?user=<?=$user?>"><img src="./images/freccia_logo.png" alt="indietro" title="INDIETRO" width="100px" height="80px"></a>
    <p>TORNA ALLA HOME</p>
    </div>

    <div id="tabella">
        <?php if($result->num_rows>0){
        ?>
        <table border="1">
        <tr>
            <th>COMMENTI</th>
        </tr>
        <?php while($row=$result->fetch_assoc()){  ?>
        <tr>
        <td>
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Pro_pic'] ).'" id="pro_pic"/>'; 
        ?>
        <?=$row['user']?> dice: <?=$row['contenuto']?> | piace a: <?=$row['mipiace']?> utenti </td>
        <?php
        }?>
        </table>
        <?php    }?>
    </div>
    </body>
</html>