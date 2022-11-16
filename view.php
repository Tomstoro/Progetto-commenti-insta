<?php 
// Include the database configuration file  
require_once '_db_dal_inc.php';
$conn=db_connect();

// Get image data from database 
$result = $conn->query("SELECT Pro_pic FROM utente WHERE user='$user'"); 
?>

<?php if($result->num_rows > 0){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Pro_pic']); ?>" /> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>