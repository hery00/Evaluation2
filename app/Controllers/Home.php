<?php
namespace App\Controllers;
use App\Models\ClientModel;
class Home extends BaseController
{
    public function index()
    {
        
      
    }

    public function form_inscription()
    {
        return view('Pages/inscription');
    }
}
