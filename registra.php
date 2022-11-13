<?php

require("_config_inc.php");
require("_db_dal_inc.php");

$user=$_GET["user"];
$email=$_GET["email"];
$psw=$_GET["psw"];

$conn=db_connect();

$result=sign_up($conn,$user,$email,$psw);

require('home.php');
?>