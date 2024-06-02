<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoureurDetailsModel;
use CodeIgniter\HTTP\ResponseInterface;

class CoureurController extends BaseController
{

    public function getCoureurByEquipe()
    {
        $idcategorie = $this->request->getGet('idcategorie');
        $session = session();
        $id_equipe = $session->get('id_user');
        $coureurDetailsModel = new CoureurDetailsModel();
        if(isset($idcategorie))
        {
            $data['coureurs']= $coureurDetailsModel->getCoureurDetailsByCategorie($id_equipe,$idcategorie);
        }
        $data['coureurs'] = $coureurDetailsModel->getCoureurDetails($id_equipe);
        $data = [
            'content' => view('Pages/coureurparequipe',$data)
        ];
        return view('Layout/layout',$data);
    }
}
