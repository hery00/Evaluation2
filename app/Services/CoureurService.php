<?php

// App/Services/CourseService.php
namespace App\Services;

use App\Models\CoureurDetailsModel;

class CoureurService
{
    protected $coureurModel;

    public function __construct()
    {
        $this->coureurModel = new CoureurDetailsModel();
    }

    public function getCoureurs()
    {
        return $this->coureurModel->getCourses();
    }
}

?>