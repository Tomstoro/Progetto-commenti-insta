<?php require("_home_header.php");?>

<?php
if(array_key_exists('user',$_GET))
    $user=$_GET['user'];

require_once('_db_dal_inc.php');
$conn=db_connect();
?>

<?php $sql = "SELECT COUNT(idC) as ncom from commento GROUP BY idP";
            $result = $conn->query($sql); 
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
    } ?>

<body>
    <!--GRAFICO COMMENTI ULTIMI 20 POST-->
<div id="left-navbar">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <canvas id="myChart" style="width:100%;max-width:70%"></canvas>
        <script>
            var xValues=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
            var yValues= <?=$row['ncom']?>;
            
            new Chart("myChart", {
                type: "line",
data: {
    labels: xValues,
    datasets: [{
    fill: false,
    lineTension: 0,
    backgroundColor: "rgba(0,0,255,1.0)",
    borderColor: "rgba(0,0,255,0.1)",
    data: yValues
    }]
},
options: {
    legend: {display: false},
    scales: {
    yAxes: [{ticks: {min: 0, max: 100}}],
    }
}
            });
        </script>
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