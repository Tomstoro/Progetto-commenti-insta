<?php 
require_once '_db_dal_inc.php'; 
$conn=db_connect();

$user=($_POST['user']);

// SE IL FORM VIENE SUBMITTATO
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        // PERMETTO SOLO ALCUNI FORMAT DI FILE
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

            // INSERISCO L'IMMAGINE
            $insert = $conn->query("UPDATE utente set Pro_pic='$imgContent' WHERE user='$user'"); 

            if($insert){ 
                $status = 'success'; 
                $statusMsg = "Immagine caricata con successo."; 
            }else{ 
                $statusMsg = "Errore nel caricamento dell'immagine, per favore riprovare."; 
            }  
        }else{ 
            $statusMsg = 'Mi dispiace, solo file JPG, JPEG, PNG, & GIF possono esssere caricati.'; 
        } 
    }else{ 
        $statusMsg = 'Per favore selezionare un immagine da caricare.'; 
    } 
} 

// DISPLAY DEL MESSAGGIO
echo $statusMsg; 
?>
<br>
<a href="profilo.php?user=<?=$user?>">Torna al profilo</a>