<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoureurDetailsModel;
use CodeIgniter\HTTP\ResponseInterface;

class CoureurController extends BaseController
{

    public function getCoureurByEquipe()
    {
        $session = session();  
        $id_equipe = $session->get('id_user');
        $id_etape = $this->request->getGet('idetape');
        $nb_coureur = $this->request->getGet('nbcoureur');
        // get idetape avy any anaty sessions
        if ($session->get('id_etape')==null &&($session->get('nb_coureur'))) {
        $session->set('id_etape',$id_etape);
        $session->set('nb_coureur',$nb_coureur);
    }

        
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
