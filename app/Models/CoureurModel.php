<?php

namespace App\Models;

use CodeIgniter\Model;
    
    class CoureurModel extends Model
    {
        
        protected $table = 'coureur';
        protected $primaryKey = 'id_coureur';
        protected $allowedFields = ['id_coureur', 'nom', 'numero_dossard', 'genre', 'date_naissance', 'id_equipe'];

        public function getCoureurByEquipe($id_equipe)
        {
            return $this->where('id_equipe', $id_equipe)
            ->findAll();
        }

        public function getCoureurByid($id_coureur)
        {
            return $this->where('id_coureur', $id_coureur)
            ->first();
        }

        public function getCoureurByCategorie($id_equipe,$id_categorie)
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
