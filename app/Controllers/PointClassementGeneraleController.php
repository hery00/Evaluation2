<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PointClassementGeneraleModel;
use CodeIgniter\HTTP\ResponseInterface;

class PointClassementGeneraleController extends BaseController
{
    public function Pointgeneral()
    {
        $indice = $this->request->getGet('indice');
        $PointClassementGeneraleModel = new PointClassementGeneraleModel();
        $data['classements'] = $PointClassementGeneraleModel->getPointClassementGenerale();
        $data['content'] = view('Pages/pointclassementgeneral', $data);
        if($indice==1)
        {
            return view('Layout/layout', $data);
        }
        return view('Layout_Admin/layout', $data);
       
    }

    public function getByEquipe()
    {
        $session = session();
        $
        $PointClassementGeneraleModel = new PointClassementGeneraleModel();
        $data['classement'] = $PointClassementGeneraleModel->getPointClassementGeneraleByEquipe($idEquipe);

        return view('classement_view', $data);
    }
}
