<?php require("_home_header.php");?>

<?php
if(array_key_exists('user',$_GET))
    $user=($_GET['user']);
?>

<body>
<div id="left-navbar">
</div>
<div id="centro">
    <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container">
        <img src="images/cuore_logo.png" alt="mi piace" title="MI PIACE" height="20px" width="20px"> 
            <a href="#"><img src="images/commenti_logo.png" alt="commenti" title="COMMENTI" height="22px" width="22px"></a>
            <p>Descrizione del post</p>
        </div>
    </div> 
    <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container">
            <img src="images/cuore_logo.png" alt="mi piace" title="MI PIACE" height="20px" width="20px"> 
            <a href="#"><img src="images/commenti_logo.png" alt="commenti" title="COMMENTI" height="22px" width="22px"></a>
            <p>Descrizione del post</p> 
        </div>
    </div>
</div>
<div id="right-navbar">
    <a href="home.php"><img src="images/home_logo.png" alt="home" width="120px" height="120px" title="HOME"></a>
    <a href="#"><img src="images/cerca_logo.png" alt="cerca" width="65px" height="65px" title="CERCA"></a>
    <a href="profilo.php?user=<?=$user?>"><?php require('view.php')?></a>
</div>
    </body>
</html>