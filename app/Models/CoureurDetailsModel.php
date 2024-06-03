<?php

namespace App\Models;

use CodeIgniter\Model;
    
    class CoureurDetailsModel extends Model
    {
        
        protected $table = 'vcoureurdetails';
        protected $allowedFields = [
            'id_coureur',
            'coureur_nom',
            'numero_dossard',
            'genre',
            'date_naissance',
            'id_equipe',
            'equipe_nom',
            'id_categorie',
            'categorie_nom'
            ];

        public function getCoureurDetails($id_equipe)
        {
            return $this->where('id_equipe', $id_equipe)
            ->findAll();
        }

        public function getCoureurDetailsByCategorie($id_equipe,$id_categorie)
        {
            return $this->where('id_categorie', $id_categorie)
                        ->where('id_equipe', $id_equipe)
                        ->findAll();
        }

        public function getCoureur()
        {
            return $this->findAll();        
        }
    
}
