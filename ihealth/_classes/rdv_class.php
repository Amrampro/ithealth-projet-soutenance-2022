<?php

class Rdv
{
    static function all_rdv(PDO $database)
    {
        $rdv_quer = $database->query("SELECT * FROM rdv ORDER BY id desc");
        return $rdv_quer->fetchAll();
    }
    // Count total number of rdv in plateform
    static function t_rdv(PDO $database)
    {
        $query = $database->query("SELECT COUNT(*) AS count FROM rdv");
        $data = $query->fetch();
        return $data["count"];
    }
    // Single consult details
    static function single_visit(PDO $database, $id)
    {

        $user_quer = $database->prepare("SELECT * FROM rdv WHERE idrdv = ?");
        $user_quer->execute([$id]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return $data;
        } else {
            return false;
        }
    }
    // doctor visit
    static function doctor_visit(PDO $database, $id_doctor)
    {

        $user_quer = $database->prepare("SELECT * FROM rdv WHERE id_docteur = ?");
        $user_quer->execute([$id_doctor]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return $data;
        } else {
            return false;
        }
    }
    // doctor visit
    static function doctor_visit_today(PDO $database, $id_doctor)
    {
        $today = date("Y-m-d");
        $user_quer = $database->prepare("SELECT * FROM rdv WHERE (idmedecin = ? AND date = ?) AND etat = 1");
        $user_quer->execute([$id_doctor, $today]);
        $data = $user_quer->fetchAll();
        return $data;
    }
    // rdv of patient
    static function rdvPatient(PDO $database, $id_patient)
    {
        $user_quer = $database->prepare("SELECT * FROM rdv WHERE idpatient = ? ORDER BY idrdv DESC");
        $user_quer->execute([$id_patient]);
        $data = $user_quer->fetchAll();
        return $data;
    }
    // Get specific information from user table
    // NOTE THAT THIRD PARAMETER WHEN CALLING IT IN A FILE IT SHOULD EXACTLY BE THE NAME OF THAT COLUMN IN THE DATABASE
    static function column(PDO $database, $id, $column)
    {

        $user_quer = $database->prepare("SELECT * FROM rdv WHERE id = ?");
        $user_quer->execute([$id]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return $data[$column];
        } else {
            die("ERREUR 404: ID de la consultation non trouvé");
        }
    }
    //user register
    static function register(PDO $database, $id_patient, $id_docteur, $libelle, $matricule, $date, $heure, $etat)
    {
        $empty = false;
        $done = true;

        if (empty($id_patient) || empty($id_docteur) || empty($libelle) || empty($matricule) || empty($date) || empty($heure) || empty($etat)) {
            return false;
        } else {
            $insert = $database->prepare("INSERT INTO rdv (idpatient, idmedecin, libelle, matricule, date, heure, etat) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $exec = $insert->execute(array($id_patient, $id_docteur, $libelle, $matricule, $date, $heure, $etat));
            if($exec == 1){
                return $exec;
            } else {
                return false;
            }
        }
    }
}
