<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FormController extends BaseController
{
    public function log()
    {
        
            return view('Pages/login');
    }
        

    public function inscrir()
    {
        return view('Pages/inscription');
    }
    public function choix_login()
    {
        return view('Pages/choix_login');
    }
}


?>
