<?php

namespace App\Models;

use CodeIgniter\Model;

class CoureurCategorieModel extends Model
{
    protected $table = 'coureurcategorie';
    protected $primaryKey = 'id_coureurcategorie';
    protected $allowedFields = ['id_coureur', 'id_categorie', 'id_equipe'];

    /**
     * Insert a new record into the CoureurCategorie table.
     *
     * @param int $idCoureur
     * @param int $idCategorie
     * @param int $idEquipe
     * @return bool
     */
    public function insertCoureurCategorie($idCoureur, $idCategorie, $idEquipe)
    {
        $data = [
            'id_coureur' => $idCoureur,
            'id_categorie' => $idCategorie,
            'id_equipe' => $idEquipe
        ];

        return $this->insert($data);
    }
}
?>
