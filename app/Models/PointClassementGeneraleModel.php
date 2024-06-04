<?php

namespace App\Models;

use CodeIgniter\Model;

class PointClassementGeneraleModel extends Model
{
    protected $table = 'point_classement_generale_categorie';
    protected $allowedFields = [
        'id_participation',
        'id_etape',
        'id_coureur',
        'etape_nom',
        'longueur_km',
        'nb_coureur',
        'rang_etape',
        'coureur_nom',
        'id_categorie',
        'nom_categorie',
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

    public function getPointClassementGeneraleByEquipe($idequipe)
    {
        return $this->where('id_equipe', $idequipe)->findAll();
    }

    public function getPointClassementGeneraleByEtape($idetape)
    {
        return $this->where('id_etape', $idetape)->findAll();
    }

    public function getPointClassementGeneraleByCategorie($idcategorie)
    {
        return $this->where('id_categorie', $idcategorie)->findAll();
    }

    public function sumPointsEquipeByCategorie($idcategorie)
    {
        $this->select('id_equipe,MAX(equipe_nom) as equipe_nom ,MAX(rang) as rang,SUM(points) as total_points');
        $this->where('id_categorie',$idcategorie);
        $this->groupBy('id_equipe');
        $this->orderBy('rang');
        return $this->findAll();
    }
    public function sumPointsEquipeByEtape($idetape)
    {
        $this->select('id_equipe,MAX(equipe_nom) as equipe_nom ,MAX(rang) as rang,SUM(points) as total_points');
        $this->where('id_etape',$idetape);
        $this->groupBy('id_equipe');
        $this->orderBy('rang');
        return $this->findAll();
    }
    public function sumPointsEquipe()
    {
        $this->select('id_equipe,MAX(equipe_nom) as equipe_nom ,MAX(rang) as rang,SUM(points) as total_points');
        $this->groupBy('id_equipe');
        $this->orderBy('rang');
        return $this->findAll();
    }
    

}
