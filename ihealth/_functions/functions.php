<?php
function get_patient_age($birthDateEntry){
    $y = substr($birthDateEntry, 0, 4);
    $m = substr($birthDateEntry, 5, 2);
    $d = substr($birthDateEntry, 8, 2);

    $birthDate = $d . '-' . $m . '-' . $y;
    $birthDate = explode("-", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
    return $age;
}
function etat_rdv($etat){
    /*
    0 -> Refusé
    1 -> Approuvé
    2 -> En attente
    */
    if($etat == 0){
        return '<span class="badge badge-danger">Refusé</span>';
    } else if($etat == 1){
        return '<span class="badge badge-success">Approuvé</span>';
    } else if($etat == 2){
        return '<span class="badge badge-warning">En attente...</span>';
    } else {
        return null;
    }
}
function matricule($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}