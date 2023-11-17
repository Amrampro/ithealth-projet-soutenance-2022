<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(empty($_SESSION["idpihealth"])){
    header("Location: login.php");
} else {
    $idpat = $_SESSION["idpihealth"];
    $pat = Patient::s_patient($db, $idpat);
}
?>