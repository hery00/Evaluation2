<?php

namespace App\Models;

use CodeIgniter\Model;

class ImportEtapeModel extends Model
{
    protected $table = 'import_etape'; // Le nom de votre table
    protected $primaryKey = 'id'; // Supposons que vous avez une colonne id comme clé primaire

    protected $allowedFields = [
        'etape',
        'longueur',
        'nb_coureur',
        'rang_etape',
        'date_depart',
        'heure_depart'
    ];

    // Optionnel : Si vous avez des colonnes de création et de mise à jour automatiques
    protected $useTimestamps = false;
    
    // Si vous avez des colonnes created_at et updated_at, définissez-les ici
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

    /**
     * Insert data from CSV.
     *
     * @param string $etape
     * @param float $longueur
     * @param int $nb_coureur
     * @param int $rang_etape
     * @param string $date_depart
     * @param string $heure_depart
     * @return bool
     */
    public function insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart)
    {
        $data = [
            'etape' => $etape,
            'longueur' => $longueur,
            'nb_coureur' => $nb_coureur,
            'rang_etape' => $rang_etape,
            'date_depart' => $date_depart,
            'heure_depart' => $heure_depart,
        ];

        return $this->insert($data);
    }
}
