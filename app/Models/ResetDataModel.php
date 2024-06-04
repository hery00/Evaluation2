<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ResetDataModel extends Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    public function resetData()
    {
        try {
           
            $tables = [
                'Course', 
                'Categorie',
                'Equipe',  
                'Coureur',
                'Categorie', 
                'Equipe',
                'Etape',
                'Participation',
                'import_etape', 
                'import_resultat', 
                'import_point'
            ];

            foreach ($tables as $table) {
                // Tronquer la table
                $this->db->table($table)->truncate();
            }

            return "Les données ont été réinitialisées avec succès.";
        } catch (\Exception $e) {
            return "Une erreur s'est produite : " . $e->getMessage();
        }
    }
}
?>

