<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Template extends BaseController
{
    public function temple()
    {
        return view('Pages/template');
    }
}
