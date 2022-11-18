<?php
require('_config_inc.php');
require_once('_db_dal_inc.php');

if(array_key_exists('user',$_GET))
    $user=$_GET['user'];

$conn= $conn= db_connect();

$sql= "SELECT  * from utente where user='$user'";
$result = $conn->query($sql);
?>

<?php if($result->num_rows>0){
while($row=$result->fetch_assoc()){  ?>
    <form id="form_dati" style="text-align: center; margin-top: 50px;" action="_cambia_dati_utente.php">
        <input type="text" name="psw" value="<?=$row['password']?>" hidden>
        <label for="user">Username</label>  
        <input type="text" name="user" value="<?=$row['user']?>" title="Nome Utente" disabled > <br><br>
        <label for="user">Email</label>
        <input type="text" name="email" value="<?=$row['email']?>" title="Email"> <br><br>
        <label for="bio">Biografia</label><br>
        <textarea rows="10" cols="30" name="bio" ><?=$row['bio']?></textarea> <br><br>
        <input type="Submit" name="sub" value="Cambia dati">
    </form>
<?php
}?>
<?php    }?>
