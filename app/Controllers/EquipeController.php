<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EquipeController extends BaseController
{
    public function index()
    {
       return view('Layout/layout');
    }
}
