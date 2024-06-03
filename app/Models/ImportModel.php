<?php

namespace App\Models;

use CodeIgniter\Model;

class ImportModel extends Model
{
    protected $table = 'import_etape';

    protected $allowedFields = ['etape', 'longueur', 'nb_coureur', 'rang_etape', 'date_depart', 'heure_depart'];

    // Méthode pour insérer les données
    // public function insertCsvData($data)
    // {
    //     return $this->insert($data);
    // }

    public function insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart)
    {
        $sql = "INSERT INTO import_etape VALUES ('%s','%d','%d','%d','%s','%s')";
        $sql = sprintf($sql,$etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart);
        echo $sql;
        $this->db->query($sql);

    }

}
