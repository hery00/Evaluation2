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
        $currentDate = new \DateTime();

        foreach ($coureurs as $coureur) {
            $birthDate = new \DateTime($coureur['date_naissance']);
            $age = $currentDate->diff($birthDate)->y;

            if ($age < 18) {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 3 // Junior
                ];
                $coureurCategorieModel->insert($data);
            }

            if ($age >= 18) {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 4 // Senior
                ];
                $coureurCategorieModel->insert($data);
            }

            if (strtolower($coureur['genre']) == 'homme') {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 1 // Homme
                ];
                $coureurCategorieModel->insert($data);
            }

            if (strtolower($coureur['genre']) == 'femme') {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 2 // Femme
                ];
                $coureurCategorieModel->insert($data);
            }
        }

        return redirect()->to('Pages/admin_dashboard');
    }
}
?>
