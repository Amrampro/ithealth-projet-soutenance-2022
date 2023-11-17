<?php

class Consultations
{
    static function all_consultations(PDO $database)
    {
        $consultations_quer = $database->query("SELECT * FROM consultations ORDER BY idconsultation desc");
        return $consultations_quer->fetchAll();
    }
    // Count total number of consultations in plateform
    static function t_consultations(PDO $database)
    {
        $query = $database->query("SELECT COUNT(*) AS count FROM consultations");
        $data = $query->fetch();
        return $data["count"];
    }
    // Single consult details
    static function s_consult(PDO $database, $id)
    {
        $user_quer = $database->prepare("SELECT * FROM consultations WHERE idconsultation = ?");
        $user_quer->execute([$id]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return $data;
        } else {
            die("ERREUR 404: ID de la consultation non trouvé");
        }
    }
    // Consultations of patient
    // Single consult
    static function p_consults(PDO $database, $id_pa)
    {
        $user_quer = $database->prepare("SELECT * FROM consultations WHERE idpatient = ? ORDER BY idconsultation DESC");
        $user_quer->execute([$id_pa]);
        $data = $user_quer->fetchAll();
        return $data;
        // if(is_array($data) && count($data) > 0){
        //     return $data;
        // } else {
        //     die("ERREUR 404: ID de la consultation non trouvé");
        // }
    }
    // Get specific information from user table
    // NOTE THAT THIRD PARAMETER WHEN CALLING IT IN A FILE IT SHOULD EXACTLY BE THE NAME OF THAT COLUMN IN THE DATABASE
    static function column(PDO $database, $id, $column)
    {

        $user_quer = $database->prepare("SELECT * FROM consultations WHERE id = ?");
        $user_quer->execute([$id]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return $data[$column];
        } else {
            die("ERREUR 404: ID de la consultation non trouvé");
        }
    }
    //user register
    static function register(PDO $database, $id_patient, $id_docteur, $taille, $tension, $temperature, $note_consult, $note_prescription, $matricule, $poids)
    {
        $empty = false;
        $done = true;

        if (empty($id_patient) || empty($id_docteur) || empty($temperature) || empty($note_consult) || empty($note_prescription) || empty($matricule)) {
            $empty = false;
            $done = false;
            return $empty;
        } else {
            $insert = $database->prepare("INSERT INTO consultations (idpatient, idmedecin, taille, tension, temperature, noteconsult, descision, matricule, poids) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $exec = $insert->execute(array($id_patient, $id_docteur, $taille, $tension, $temperature,  $note_consult, $note_prescription, $matricule, $poids));
            if($exec == 1){
                return $exec;
            } else {
                return false;
            }
        }
    }
}
