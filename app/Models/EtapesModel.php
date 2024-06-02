<?php

namespace App\Models;

use CodeIgniter\Model;

class EtapesModel extends Model
{
    protected $table = 'etape'; 
    protected $primaryKey = 'id_etape';
    protected $allowedFields = ['nom','longueur_km','nb_coureur','rang_etape','id_course'];
    protected $returnType = 'array';

    public function getEtapesByCourse($id_course)
    {
        return $this->where('id_course', $id_course)
                    ->findAll();
    }

}
