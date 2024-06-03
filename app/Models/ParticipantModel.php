<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
    protected $table = 'participation';
    protected $primaryKey = 'id_participation';

    protected $allowedFields = [
        'id_etape',
        'id_coureur',
        'id_equipe',
        'heure_depart',
        'heure_arrivee'
    ];

    public function EfaParticipant($id_etape, $id_equipe, $id_coureur)
    {
        $participant = $this->where([
            'id_etape' => $id_etape,
            'id_equipe' => $id_equipe,
            'id_coureur' => $id_coureur
        ])->first();
        if($participant)
        {
            return true;
        }
        return false;
    }

    public function countparticipant($id_etape, $id_equipe)
    {
        return $this->where('id_etape', $id_etape)
        ->where('id_equipe', $id_equipe)
        ->countAllResults();
    }


    public function insertParticipation($id_etape, $id_equipe, $id_coureur)
    {
        $data = [
                'id_etape' => $id_etape,
                'id_equipe' => $id_equipe,
                'id_coureur' => $id_coureur
             ];
        
            return $this->insert($data);   
    }

    public function getParticipationsByEtape($id_etape)
    {
        return $this->where('id_etape', $id_etape)->findAll();
    }

}
