<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EtapesModel;
use App\Models\CoureurDetailsModel;
use App\Models\ParticipationDetailsModel;
use CodeIgniter\HTTP\ResponseInterface;

class EtapesController extends BaseController
{
    public function getCoureurEtape()
    {
        $session = session();  
        $id_equipe = $session->get('id_user');
        $etapeModel = new EtapesModel();
        $coureurDetailsModel = new CoureurDetailsModel();
        $data['etapes'] = $etapeModel->getEtapesByCourse();
        $data['coureurs'] = $coureurDetailsModel->getCoureurDetails($id_equipe);
        $data =
        [
            'content' => view('Pages/ListeCoureurEquipe',$data)
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
    public function getEtapesdetails()
    {
        $etapes = new EtapesModel();
        $list_etape = $etapes->getEtapesByCourse();
        $participation = new ParticipationDetailsModel();
        
        $list_participation = $participation->getParticipationsDetailsByEtape($id_etape);
    }

}
