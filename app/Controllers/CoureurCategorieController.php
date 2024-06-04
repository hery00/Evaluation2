<?php

namespace App\Controllers;

use App\Models\CoureurModel;
use App\Models\CategorieModel;
use App\Models\CoureurCategorieModel;
use Datetime;

class CoureurCategorieController extends BaseController
{
    public function insert()
    {
        $coureurModel = new CoureurModel();
        $categorieModel = new CategorieModel();
        $coureurCategorieModel  = new CoureurCategorieModel();

        $coureurs = $coureurModel->getCoureur();
        $currentDate = new DateTime();

        foreach ($coureurs as $coureur) {
            $birthDate = new DateTime($coureur['date_naissance']);
            $age = $currentDate->diff($birthDate)->y;

            if ($age < 18) {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 3,
                    'id_equipe' => $coureur['id_equipe']
                ];
                $coureurCategorieModel->insertCoureurCategorie($data);
            }

            if ($age >= 18) {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 4,
                    'id_equipe' => $coureur['id_equipe']
                ];
                $coureurCategorieModel->insertCoureurCategorie($data);
            }

            if (strtolower($coureur['genre']) == 'homme') {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 1,
                    'id_equipe' => $coureur['id_equipe']
                ];
                $coureurCategorieModel->insertCoureurCategorie($data);
            }

            if (strtolower($coureur['genre']) == 'femme') {
                $data = [
                    'id_coureur' => $coureur['id_coureur'],
                    'id_categorie' => 2,
                    'id_equipe' => $coureur['id_equipe']
                ];
                $coureurCategorieModel->insertCoureurCategorie($data);
            }
        }

        return redirect()->to('import');
    }
}
?>
