<?php
require('_config_inc.php');
require_once('_db_dal_inc.php');

if(array_key_exists('user',$_GET))
    $user=$_GET['user'];

$conn= $conn= db_connect();

$sql= "SELECT  * from post";
$result = $conn->query($sql);
?>

<?php if($result->num_rows>0){
while($row=$result->fetch_assoc()){  ?>
    <div class="card">
        <p id="nomeutente">Utente: <?=$row['user']?></p>
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['immagine'] ).'" id="post"/>'; 
        ?>
        <div class="container">
            Piace a: <?=$row['mipiace']?> utenti! <img src="images/cuore_logo.png" alt="mi piace" title="MI PIACE" height="20px" width="20px">
            <a href="commenti.php?idP=<?=$row['idP']?>&user=<?=$user?>"><img src="images/commenti_logo.png" alt="commenti" title="COMMENTI" height="22px" width="22px"></a>
            <br> <br><p id="descrizione">La descrizione di  <?=$row['user']?> : <?=$row['descr']?></p>
        </div>
    </div> 
<?php
}?>
<?php    }?>
