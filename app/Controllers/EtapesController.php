<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EtapesModel;
use CodeIgniter\HTTP\ResponseInterface;

class EtapesController extends BaseController
{
    public function etapesbycategorieByCourse()
    {
        $id_course = $this->request->getGet('idcourse');
        $id_categorie = $this->request->getGet('idcategorie');
        if(isset($id_categorie)){
            $idcategorie=$id_categorie;
        }
        else
        {
            $idcategorie=1;
        }
        
        $data['id_course'] = $id_course;
        $etapeModel = new EtapesModel();
        $data['etapes'] = $etapeModel->getEtapesByCategorieByCourse($id_course,$idcategorie);
        $data = [
            'content' => view('Pages/etapescourse',$data)
        ];
        return view('Layout/layout',$data);
    }
}
