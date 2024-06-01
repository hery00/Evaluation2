<?php

namespace App\Controllers;

use CodeIgniter\Controller;
// ty no mandefa anle data
class Home extends Controller
{
    public function index()
    {
        $data = [
            'content' => view('Page/accueil')
        ];
        return view('Layout/layout', $data);
    }   
}







?>