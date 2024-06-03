<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipationDetailsModel extends Model
{
    protected $table = 'vParticipationDetails';
    protected $returnType = 'array';
    protected $allowedFields = [
        'id_participation', 'heure_depart', 'heure_arrivee',
        'id_etape', 'etape_nom', 'longueur_km', 'nb_coureur', 'rang_etape', 'id_course',
        'id_coureur', 'coureur_nom', 'numero_dossard', 'genre', 'date_naissance',
        'id_equipe', 'equipe_nom'
    ];

    public function getParticipationsDetailsByEtape($id_etape)
    {
        return $this->where('id_equipe', $id_etape)->findAll();
    }

}