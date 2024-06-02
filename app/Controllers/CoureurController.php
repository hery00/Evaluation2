<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoureurDetailsModel;
use CodeIgniter\HTTP\ResponseInterface;

class CoureurController extends BaseController
{

    public function getCoureurByEquipe()
    {
        
        $coureurDetailsModel = new CoureurDetailsModel();
        if(isset($_GET['idcategorie']))
        {
            $idcategorie = $_GET['idcategorie'];
            $data['coureurs']= $coureurDetailsModel->getCoureurDetailsByCategorie($id_equipe,$idcategorie);
        }
        else{
            $data['coureurs'] = $coureurDetailsModel->getCoureurDetails($id_equipe);
        }
       
        $data = [
            'content' => view('Pages/coureurparequipe',$data)
        ];
        return view('Layout/layout',$data);
    }
}
