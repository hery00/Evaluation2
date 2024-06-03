<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EtapesModel;
use CodeIgniter\HTTP\ResponseInterface;

class EtapesController extends BaseController
{
    public function etapesByCourse()
    {
        
        $id_course = $this->request->getGet('idcourse');
        
        $data['id_course'] = $id_course;
        $etapeModel = new EtapesModel();
        $data['etapes'] = $etapeModel->getEtapesByCourse($id_course);
        $data =
        [
            'content' => view('Pages/etapescourse',$data)
        ];
        return view('Layout/layout',$data);
    }

    public function etapesCourseAdmin()
    {
        
        $id_course = $this->request->getGet('idcourse');
        
        $data['id_course'] = $id_course;
        $etapeModel = new EtapesModel();
        $data['etapes'] = $etapeModel->getEtapesByCourse($id_course);
        $data =
        [
            'content' => view('Pages/admin_dashboard',$data)
        ];
        return view('Layout_Admin/layout',$data);
    }

}
