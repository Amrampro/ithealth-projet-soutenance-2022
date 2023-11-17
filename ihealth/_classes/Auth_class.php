<?php
class Auth
{
    static function all_authorisations(PDO $database)
    {
        $authorisationconsult_quer = $database->query("SELECT * FROM authorisationconsult");
        return $authorisationconsult_quer->fetchAll();
    }
    static function verify(PDO $database, $id_pa, $id_doc)
    {

        $user_quer = $database->prepare("SELECT * FROM authorisationconsult WHERE idpatient = ? AND idmedecin = ?");
        $user_quer->execute([$id_pa, $id_doc]);
        $data = $user_quer->fetch();
        if(is_array($data) && count($data) > 0){
            return true;
        } else {
            return false;
        }
    }
    // Get specific authorisationconsult
    static function authpatient(PDO $database, $idpatient)
    {
        $user_quer = $database->prepare("SELECT * FROM authorisationconsult WHERE idpatient = ?");
        $user_quer->execute([$idpatient]);
        return $user_quer->fetchAll();
    }
    //auth register
    static function register(PDO $database, $idpatient, $idmedecin)
    {
        $done = null;
        $query = $database->query("SELECT * FROM authorisationconsult WHERE idpatient LIKE '$idpatient' AND idmedecin LIKE '$idmedecin'");
        $found = $query->fetchall(PDO::FETCH_ASSOC);
        if (is_array($found) && count($found) > 0) {
            $done = false;
        } else {
            $insert = $database->prepare("INSERT INTO authorisationconsult (idpatient, idmedecin) VALUES (?, ?)");
            $insert->execute(array($idpatient, $idmedecin));
            $done = true;
        }
        return $done;
    }
    //auth register
    static function remove(PDO $database, $idpatient, $idmedecin)
    {
        $done = null;
        $query = $database->query("SELECT * FROM authorisationconsult WHERE idpatient LIKE '$idpatient' AND idmedecin LIKE '$idmedecin'");
        $found = $query->fetchall(PDO::FETCH_ASSOC);
        if (is_array($found) && count($found) > 0) {
            $del = $database -> prepare("DELETE FROM authorisationconsult WHERE idpatient LIKE '$idpatient' AND idmedecin LIKE '$idmedecin'");
            $del -> execute(array($idpatient, $idmedecin));
            $done = true;
        } else {
            $done = false;
        }
        return $done;
    }
}
