<?php

class Patient
{
    static function all_patient(PDO $database)
    {
        $patient_quer = $database->query("SELECT * FROM patient");
        return $patient_quer->fetchAll();
    }
    // Count total number of patient in plateform
    static function t_patient(PDO $database)
    {
        $query = $database->query("SELECT COUNT(*) AS count FROM patient");
        $data = $query->fetch();
        return $data["count"];
    }
    // Get specific patient
    static function s_patient(PDO $database, $idpatient)
    {

        $user_quer = $database->prepare("SELECT * FROM patient WHERE idpatient = ?");
        $user_quer->execute([$idpatient]);
        return $user_quer->fetch();
    }
    // Get specific information from user table
    // NOTE THAT THIRD PARAMETER WHEN CALLING IT IN A FILE IT SHOULD EXACTLY BE THE NAME OF THAT COLUMN IN THE DATABASE
    static function column(PDO $database, $idpatient, $column)
    {

        $user_quer = $database->prepare("SELECT * FROM patient WHERE idpatient = ?");
        $user_quer->execute([$idpatient]);
        $data = $user_quer->fetch();

        return $data[$column];
    }
    //user sign in
    static function login(PDO $database, $mat, $password)
    {
        $isSuccess = false;

        $query = $database->query("SELECT * FROM patient WHERE mat LIKE '$mat'");
        $found = $query->fetchall(PDO::FETCH_ASSOC);
        if (is_array($found) && count($found) > 0) {
            $passwordInDb = $found[0]['pass'];
            if (password_verify($password, $passwordInDb)) {
                session_destroy();
                session_start();
                $_SESSION["idpihealth"] = $found[0]['idpatient'];
                $isSuccess = true;
                return $isSuccess;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //user register
    static function register(PDO $database, $nom, $prenom, $genre, $adresse, $groupsanguin, $datenais, $image, $mat, $email, $tel, $pass, $question, $reponse)
    {
        $passfinal = password_hash($pass, PASSWORD_DEFAULT);
        $query = $database->query("SELECT * FROM patient WHERE email LIKE '$email'");
        $found = $query->fetchall(PDO::FETCH_ASSOC);
        $done = false;
        if (is_array($found) && count($found) > 0) {
            echo "<script> alert('Cet email existe déjà'); </script>";
        } else {
            $insert = $database->prepare("INSERT INTO patient (nom, prenom, genre, adresse, groupsanguin, datenais, image, mat, email, tel, pass, question, reponse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $insert->execute(array($nom, $prenom, $genre, $adresse, $groupsanguin, $datenais, $image, $mat, $email, $tel, $passfinal, $question, $reponse));
            $done = true;
        }
        return $done;
    }
}
