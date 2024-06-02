<?php

// App/Services/CourseService.php
namespace App\Services;

use App\Models\CoursesModel;

class CourseService
{
    protected $courseModel;

    public function __construct()
    {
        $this->courseModel = new CoursesModel();
    }

    public function getCourses()
    {
        $session = session();
        if($session->get('id_etape')&&$session->get('nb_coureur'))
        {
            $session->remove('id_etape');
            $session->remove('nb_coureur');
        }
        return $this->courseModel->getCourses();
    }
}

?>