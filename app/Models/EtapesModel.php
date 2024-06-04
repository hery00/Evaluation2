<?php

namespace App\Models;

use CodeIgniter\Model;

class EtapesModel extends Model
{
    protected $table = 'etape'; 
    protected $primaryKey = 'id_etape';
    protected $allowedFields = [
        'nom', 
        'longueur_km', 
        'nb_coureur', 
        'rang_etape', 
        'id_course', 
        'depart'
    ];
    protected $returnType = 'array';

    public function getEtapesByCourse()
    {
        return $this->findAll();
    }
    public function getEtapesById($id_etape)
    {
            return $this->where('id_etape', $id_etape)
            ->first();
    }

    public function insert_etapecsv()
    {
        $query = $this->db->query
        ('
            INSERT INTO Etape (nom, longueur_km, nb_coureur, rang_etape, depart)
            SELECT etape, longueur, nb_coureur, rang_etape, TIMESTAMP WITH TIME ZONE (date_depart AT TIME ZONE \'UTC\' + heure_depart) AS depart
            FROM import_etape
            GROUP BY etape, longueur, nb_coureur, rang_etape, date_depart, heure_depart
        
        ');

        return $query->resultID; 
    }
}
