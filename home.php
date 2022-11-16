<?php require("_home_header.php");?>

<?php
if(array_key_exists('user',$_GET))
    $user=($_GET['user']);

require_once('_db_dal_inc.php');
$conn=db_connect();
?>

<body>
<div id="left-navbar">
</div>
<div id="centro">
<?php require_once('display_post.php')?>
</div>
<div id="right-navbar">
    <a href="home.php?user=<?=$user?>"><img src="images/home_logo.png" alt="home" width="120px" height="120px" title="HOME"></a>
    <a href="#"><img src="images/cerca_logo.png" alt="cerca" width="65px" height="65px" title="CERCA"></a>
    
    <a href="profilo.php?user=<?=$user?>" title="PROFILO">
    <?php $sql = "SELECT Pro_pic FROM utente WHERE user = '$user'";
    $sth = $conn->query($sql);
    $result=mysqli_fetch_array($sth);
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['Pro_pic'] ).'"/>'; 
    ?>
    </a>
</div>
    </body>
</html>
<? $conn->close();?>