<?php

class Specialite
{
    static function all_specialite(PDO $database)
    {
        $specialite_quer = $database->query("SELECT * FROM specialite");
        return $specialite_quer->fetchAll();
    }
    // Count total number of specialite in plateform
    static function t_specialite(PDO $database)
    {
        $query = $database->query("SELECT COUNT(*) AS count FROM specialite");
        $data = $query->fetch();
        return $data["count"];
    }
    // Get specific specialite
    static function s_specialite(PDO $database, $id)
    {

        $user_quer = $database->prepare("SELECT * FROM specialite WHERE idspecialite = ?");
        $user_quer->execute([$id]);
        return $user_quer->fetch();
    }
    // Get specific information from user table
    // NOTE THAT THIRD PARAMETER WHEN CALLING IT IN A FILE IT SHOULD EXACTLY BE THE NAME OF THAT COLUMN IN THE DATABASE
    static function column(PDO $database, $id, $column)
    {
        $user_quer = $database->prepare("SELECT * FROM specialite WHERE idspecialite = ?");
        $user_quer->execute([$id]);
        $data = $user_quer->fetch();
        if (is_array($data) && count($data) > 0) {
            return $data[$column];
        } else {
            return null;
        }
    }
    //user register
    static function register(PDO $database, $nom)
    {
        $done = null;
        $query = $database->query("SELECT * FROM specialite WHERE nom LIKE '$nom'");
        $found = $query->fetchall(PDO::FETCH_ASSOC);
        if (is_array($found) && count($found) > 0) {
            $done = "Specialite existente";
        } else {
            $insert = $database->prepare("INSERT INTO specialite (nom) VALUES (?)");
            $insert->execute(array($nom));
            $done = true;
        }
        return $done;
    }
}
