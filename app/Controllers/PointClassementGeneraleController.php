<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PointClassementGeneraleModel;
use CodeIgniter\HTTP\ResponseInterface;

class PointClassementGeneraleController extends BaseController
{
    public function index()
    {
        $PointClassementGeneraleModel = new PointClassementGeneraleModel();
        $data['classement'] = $PointClassementGeneraleModel->getPointClassementGenerale();

        return view('classement_view', $data);
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
