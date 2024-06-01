<?php

namespace App\Models;

use CodeIgniter\Model;

class MaisonModel extends Model
{
    protected $table = 'maison';
    protected $allowedFields =['id_maison','type_maison', 'id_travaux', 'description_maison', 'duree'];
}
