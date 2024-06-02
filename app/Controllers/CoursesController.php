<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoursesModel;
use App\Models\EtapesModel;

class CoursesController extends BaseController
{
    public function index()
    {
        $courseModel = new CoursesModel();
        $data['courses'] = $courseModel->getCourses();
        return view('Layout/sidebar', $data);
    }
    
}

