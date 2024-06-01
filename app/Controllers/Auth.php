<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post')
        {
            $model = new UserModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $model->getUser($username, $password);
            if ($user) {
                $session = session();
                $session->set('user_id', $user['id']);
                $session->set('username', $user['username']);
                $session->set('role', $user['role']);

                if ($user['statut'] == '0') {
                    return redirect()->to('/admin/dashboard');
                } else if ($user['statut'] == 1) {
                    return redirect()->to('/client/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect.');
            }
        }

        return view('login');
    }

    

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
