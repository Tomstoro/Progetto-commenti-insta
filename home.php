<?php require("_home_header.php");?>

<?php
if(array_key_exists('user',$_GET))
    $user=$_GET['user'];

require_once('_db_dal_inc.php');
$conn=db_connect();
?>

<body>
<div id="left-navbar">

</div>

<!--DISPLAY DEI POST-->
<div id="centro">
<?php require_once('_display_post.php')?>
</div>

<!--NAVBAR DESTRA CON FOTO PROFILO E LINK UTILI-->
<div id="right-navbar">
    <a href="home.php?user=<?=$user?>"><img src="images/home_logo.png" alt="home" width="120px" height="120px" title="HOME"></a>
    <a href="#"><img src="images/cerca_logo.png" alt="cerca" width="65px" height="65px" title="CERCA"></a>
    
    <a href="profilo.php?user=<?=$user?>" title="PROFILO">
    <?php $sql = "SELECT Pro_pic FROM utente WHERE user = '$user'";
    $sth = $conn->query($sql);
    $result=mysqli_fetch_array($sth);
    if($result['Pro_pic']!=null)
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['Pro_pic'] ).'" id="pro_pic""/>'; 
    echo "PROFILO";
    ?>
    </a>
    <a href="index.php"><img src="" alt="LOG-OUT"></a>
</div>

    </body>
</html>
<? $conn->close();?>