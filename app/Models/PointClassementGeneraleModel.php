<?php

namespace App\Models;

use CodeIgniter\Model;

class PointClassementGeneraleModel extends Model
{
    protected $table = 'point_classement_generale';
    protected $primaryKey = 'id_participation';
    protected $allowedFields = [
        'id_participation',
        'id_etape',
        'id_coureur',
        'etape_nom',
        'longueur_km',
        'nb_coureur',
        'rang_etape',
        'coureur_nom',
        'numero_dossard',
        'date_naissance',
        'id_equipe',
        'equipe_nom',
        'chronos',
        'rang',
        'points'
    ];
    public function getPointClassementGenerale()
    {
        return $this->findAll();
    }

    public function getPointClassementGeneraleByEquipe($idEquipe)
    {
        return $this->where('id_equipe', $idEquipe)->findAll();
    }
    

}
