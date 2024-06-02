<?php

namespace App\Models;

use CodeIgniter\Model;

class EtapesModel extends Model
{
    protected $table = 'viewetapecategorie';
    protected $allowedFields = [
        'id_etape', 'nom_etape', 'longueur_km', 'nb_coureur', 'rang_etape', 'id_course', 'id_categorie', 'nom_categorie'
    ];

    protected $returnType = 'array';

    public function getEtapesByCategorieByCourse($id_course,$id_categorie)
    {
        return $this->where('id_course', $id_course)
                    ->where('id_categorie', $id_categorie)
                    ->findAll();
    }

}
