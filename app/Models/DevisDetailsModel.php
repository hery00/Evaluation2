<?php

namespace App\Models;

use CodeIgniter\Model;

class DevisDetailsModel extends Model
{
    protected $table = 'devis_details';
    protected $primaryKey = 'id_devis';
    protected $allowedFields = ['id_devis', 'date_devis', 'id_maison', 'id_travaux', 'date_debut', 'id_finition', 'id_client', 'type_maison', 'duree', 'date_fin', 'type_finition', 'num_telephone', 'quantite', 'designation', 'unite', 'pu', 'montant'];
}
