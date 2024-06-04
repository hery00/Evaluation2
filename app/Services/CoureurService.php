<?php

// App/Services/CourseService.php
namespace App\Services;

use App\Models\CoureurModel;

class CoureurService
{
    protected $coureurModel;

    public function __construct()
    {
        $this->coureurModel = new CoureurModel();
    }

    public function getCoureurs()
    {
        return $this->coureurModel->getCourses();
    }
}

?>