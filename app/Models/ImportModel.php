<?php

namespace App\Models;

use CodeIgniter\Model;

class ImportModel extends Model
{
    protected $table = 'import_csvs';

    protected $allowedFields = ['type_maison', 'description', 'surface', 'code_travaux', 'type_travaux', 'unite', 'prix_unitaire', 'quantite', 'duree_travaux'];

    // Méthode pour insérer les données
    // public function insertCsvData($data)
    // {
    //     return $this->insert($data);
    // }

    public function insertCsvData($type_maison, $description, $surface, $code_travaux, $type_travaux, $unite, $prix_unitaire, $quantite, $duree_travaux)
    {
        $sql = "INSERT INTO import_csvs VALUES ('%s','%s','%s','%d','%s','%s','%d','%d','%d')";
        $sql = sprintf($sql,$type_maison, $description, $surface, $code_travaux, $type_travaux, $unite, $prix_unitaire, $quantite, $duree_travaux);
        echo $sql;
        $this->db->query($sql);

    }

}
