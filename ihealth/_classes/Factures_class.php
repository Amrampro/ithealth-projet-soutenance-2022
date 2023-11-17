<?php

class Factures
{
    static function all_factures(PDO $database)
    {
        $factures_quer = $database->query("SELECT * FROM factures");
        return $factures_quer->fetchAll();
    }
    // Get specific information from fact table
    // NOTE THAT THIRD PARAMETER WHEN CALLING IT IN A FILE IT SHOULD EXACTLY BE THE NAME OF THAT COLUMN IN THE DATABASE
    static function column(PDO $database, $id, $column)
    {

        $fact_quer = $database->prepare("SELECT * FROM factures WHERE id = ?");
        $fact_quer->execute([$id]);
        $data = $fact_quer->fetch();

        return $data[$column];
    }
    //fact register
    static function register(PDO $database, $id_worker, $mat, $cons_mat, $prix, $advanced, $annee)
    {
        // Empty: 0
        // Suceeded: 1
        // Error occured: 2
        if (empty($id_worker) || empty($mat) || empty($cons_mat) || empty($prix) || empty($advanced) || empty($annee) || empty($id_worker)) {
            return 0;
        } else {
            $insert = $database->prepare("INSERT INTO factures (fac_by, fac_mat, matricule_consult, prix, montant_avance, annee) VALUES (?, ?, ?, ?, ?, ?)");
            $exec = $insert->execute(array($id_worker, $mat, $cons_mat, $prix, $advanced, $annee));
            if($exec){
                return 1;
            } else {
                return 2;
            }
        }
    }
}
