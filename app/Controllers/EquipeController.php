<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParticipationDetailsModel;
use CodeIgniter\HTTP\ResponseInterface;

class EquipeController extends BaseController
{
    public function index()
    {
       return view('Layout/layout');
    }

    public function getParticipationetape()
    {
        $participation = new ParticipationDetailsModel();
        

    }


}
