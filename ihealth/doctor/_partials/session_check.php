<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(empty($_SESSION["idmihealth"])){
    header("Location: login.php");
} else {
    $idmed = $_SESSION["idmihealth"];
    $med = Medecin::s_medecin($db, $idmed);
}
?>