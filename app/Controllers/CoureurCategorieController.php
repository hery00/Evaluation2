<?php

namespace App\Controllers;

use App\Models\CoureurDetailsModel;
use App\Models\CategorieModel;
use App\Models\CoureurCategorieModel;

class CoureurCategorieController extends BaseController
{
    public function insert()
    {
        $coureurModel = new CoureurDetailsModel();
        $categorieModel = new CategorieModel();
        $coureurCategorieModel  = new CoureurCategorieModel();

        $coureurs = $coureurModel->getCoureur();
        $currentYear = date('Y');

        foreach ($coureurs as $coureur) {
            $birthYear = date('Y', strtotime($coureur['date_naissance']));
            $age = $currentYear - $birthYear;

            if ($age < 18) {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 3
                ];

                $coureurCategorieModel->insert($data);
            }

            if ($age > 18) {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 4
                ];

                $coureurCategorieModel->insert($data);
            }

            if (strtolower($coureur['genre']) == 'homme') {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 1
                ];

                $coureurCategorieModel->insert($data);
            }

            if (strtolower($coureur['genre']) == 'femme') {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 2
                ];

                $coureurCategorieModel->insert($data);
            }
        }

        return redirect()->to('Pages/admin_dashboard');

    }
    
}
?>