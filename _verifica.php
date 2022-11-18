<?php

require("_config_inc.php");
require("_db_dal_inc.php");

$user=$_GET["user"];
$psw=$_GET["psw"];

$conn=db_connect();

verify($conn,$user,$psw);

?>