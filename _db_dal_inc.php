<?php

require("_config_inc.php");

function db_connect()
{
    global $servername,$username,$password,$dbname;

    $conn=new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
}

    return $conn;
}

function verify($conn,$user,$psw)
{
    $user=$conn->real_escape_string($user);
    $psw=$conn->real_escape_string($psw);
    $hash=password_hash($psw, PASSWORD_BCRYPT);
    if(password_verify($psw,$hash))
    {
        require("home.php");
    }
    else{ echo "Credenziali errate o inesistenti, riprovare"; exit;}
}

function sign_up($conn,$user,$email,$psw)
{
    $user=$conn->real_escape_string($user);
    $psw=$conn->real_escape_string($psw);
    $psw=password_hash($psw, PASSWORD_BCRYPT);
    $email=$conn->real_escape_string($email);
    $sql=mysqli_query($conn,"SELECT * FROM utente where email='$email' or user='$user'");
if(mysqli_num_rows($sql)>0)
{
    echo "Username o email già in uso"; 
	exit;
}
        $qr="INSERT INTO `utente`(`user`, `email`, `password`) VALUES ('$user','$email','$psw')";
        echo "Registrazione completata";
        return $conn->query($qr);
}

function add_commento($conn,$user,$idP,$contenuto)
{
    if($user!=null)
    {
        $user=$conn->real_escape_string($user);
        $idP=intval($idP);
        $contenuto=$conn-> real_escape_string($contenuto);
        $sql=mysqli_query($conn,"INSERT INTO `commento` (`contenuto`, `idP`, `user`) VALUES ('$contenuto','$idP','$user')");
        $conn->query($sql);
        echo "Commento pubblicato";
    }
    else {echo "Non è possibile commentare se non si è iscritti al sito web";}

}