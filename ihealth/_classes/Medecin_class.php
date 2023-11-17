<?php

class Medecin
{
    static function all_medecin(PDO $database)
    {
        $medecin_quer = $database->query("SELECT * FROM medecin");
        return $medecin_quer->fetchAll();
    }
    // Count total number of medecin in plateform
    static function t_medecin(PDO $database)
    {
        $query = $database->query("SELECT COUNT(*) AS count FROM medecin");
        $data = $query->fetch();
        return $data["count"];
    }
    // Get specific medecin
    static function s_medecin(PDO $database, $id)
    {

        $user_quer = $database->prepare("SELECT * FROM medecin WHERE idmedecin = ?");
        $user_quer->execute([$id]);
        return $user_quer->fetch();
    }
    // Get specific information from user table
    // NOTE THAT THIRD PARAMETER WHEN CALLING IT IN A FILE IT SHOULD EXACTLY BE THE NAME OF THAT COLUMN IN THE DATABASE
    static function column(PDO $database, $id, $column)
    {
        $user_quer = $database->prepare("SELECT * FROM medecin WHERE idmedecin = ?");
        $user_quer->execute([$id]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return $data[$column];
        } else {
            return null;
        }  
    }
    //user sign in
    static function login(PDO $database, $login, $password)
    {
        $isSuccess = false;

        $date = date("Y-m-d H:i:s");

        $query = $database->query("SELECT * FROM medecin WHERE login LIKE '$login'");
        $found = $query->fetchall(PDO::FETCH_ASSOC);
        if (is_array($found) && count($found) > 0) {
            $passwordInDb = $found[0]['password'];
            if (password_verify($password, $passwordInDb)) {
                session_destroy();
                session_start();
                $_SESSION["idmihealth"] = $found[0]['idmedecin'];
                $_SESSION["sess"] = $found[0]['nom'] . $found[0]['idmedecin'];
                $isSuccess = true;

                $lastcon = $database->prepare("UPDATE medecin SET dernierecon = ? WHERE idmedecin = ?");
                $lastcon->execute([$date, $_SESSION["idmihealth"]]);

                return $isSuccess;
            } else {
                return 'Mot de passe incorrect';
            }
        } else {
            return 'Compte Inexistent!';
        }
    }
    //user register
    static function register(PDO $database, $f_name, $l_name, $u_name, $email, $adress, $phone, $about, $image, $pass, $confirm_pass)
    {
        $country = "FRANCE";
        $status = "active";
        $done = false;

        if (empty($f_name) || empty($l_name) || empty($u_name) || empty($adress) || empty($country) || empty($phone) || empty($email) || empty($pass) || empty($confirm_pass)) {
            echo "<script> alert('Veuillez remplir tout les champs'); </script>";
        } else if ($pass != $confirm_pass) {
            echo "<script> alert('Mots de passes non identique'); </script>";
        } else {
            $passfinal = password_hash($pass, PASSWORD_DEFAULT);
            $query = $database->query("SELECT * FROM medecin WHERE email LIKE '$email'");
            $found = $query->fetchall(PDO::FETCH_ASSOC);
            if (is_array($found) && count($found) > 0) {
                echo "<script> alert('Cet email existe déjà'); </script>";
            } else {
                $insert = $database->prepare("INSERT INTO medecin (first_name, last_name, username, email, pass, adress, phone, about, status, country, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $insert->execute(array($f_name, $l_name, $u_name, $email, $passfinal, $adress, $phone, $about, $status, $country, $image));
                $done = true;
            }
        }
        return $done;
    }
}
