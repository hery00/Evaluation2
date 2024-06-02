<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        
    }
    public function Admin()
    {
        $data = [
            'content' => view('Pages/admin_dashboard')
        ];
        return view('Layout/layout',$data);
    }

}
