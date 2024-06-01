<?php

namespace App\Models;

use CodeIgniter\Model;

class DevisModel extends Model
{
    protected $table = 'devis';
    protected $allowedFields = [
        'id_devis',
        'date_devis',
        'id_maison',
        'id_finition',
        'id_client',
        'date_debut'
    ];
}
