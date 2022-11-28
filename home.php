<?php require("_home_header.php");?>

<?php
if(array_key_exists('user',$_GET))
    $user=$_GET['user'];
else {$user=null;}

require_once('_db_dal_inc.php');
$conn=db_connect();
?>

<?php $sql = "SELECT COUNT(idC) as ncom from commento GROUP BY idP";
            $result = $conn->query($sql); 
            if($result->num_rows>0){
                $ncom=array();
                while($row=$result->fetch_assoc())
                {
                $ncom[]= $row["ncom"];
                }
    } ?>

<body>
    <!--GRAFICO COMMENTI ULTIMI 20 POST-->
<div id="left-sidebar">
<canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// Setup block
const ncom=<?php echo json_encode($ncom);?>;
const data={
labels: ['Post1', 'Post2', 'Post3', 'Post4', 'Post5'],
    datasets: [{
        label: 'Numero di commenti',
        data: ncom,
        borderWidth: 1
    }]
};

// Config block
const config={
    type: 'bar',
    data,
    options: {
    scales: {
        y: {
        beginAtZero: true
        }
    }
    }
};

//render block
const myChart =new Chart(
document.getElementById('myChart'),
config
);

</script>


<!--DISPLAY DEI POST-->
<div id="centro">
<?php require_once('_display_post.php')?>
</div>

<!--NAVBAR DESTRA CON FOTO PROFILO E LINK UTILI-->
<div id="right-sidebar">
    <a href="home.php?user=<?=$user?>"><img src="images/home_logo.png" alt="home" title="HOME" id="home_img"><p>HOME</p> </a>
    <a href="#"><img src="images/cerca_logo.png" alt="cerca" title="CERCA" id="cerca_img"><p>CERCA</p></a>
    
    <?php 
    if($user!=null)
    {
        ?><a href="profilo.php?user=<?=$user?>" title="PROFILO"> <?php 
        $sql = "SELECT Pro_pic FROM utente WHERE user = '$user'";
        $sth = $conn->query($sql);
        $result=mysqli_fetch_array($sth);
        if($result['Pro_pic']!=null)
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['Pro_pic'] ).'" id="pro_pic""/>'; 
        ?> <p>PROFILO</p> <?php  
    }
    ?>
    
    </a>
    <a href="index.php"><img src="./images/log_out.png" alt="LOG-OUT" title="LOG-OUT" id="logout_img"><p>LOG-OUT</p></a>
</div>
    </body>
</html>
<? $conn->close();?>