<?php

namespace App\Models;

use CodeIgniter\Model;

class FinitionModel extends Model
{
    protected $table      = 'finition';
    protected $primaryKey = 'id_finition';
    protected $allowedFields = ['type_finition'];
}
