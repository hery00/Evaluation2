<?php

namespace App\Models;

use CodeIgniter\Model;

class DevisMaisonModel extends Model
{
    protected $table = 'devis_maison';
    protected $allowedFields = [
        
        'id_devis',
        'date_devis',
        'id_maison',
        'type_maison',
        'type_finition',
        'date_debut',
        'id_finition',
        'id_client',
        'num_telephone'
    ];
}
