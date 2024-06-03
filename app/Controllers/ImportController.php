<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImportModel;
use CodeIgniter\Files\File;

class ImportController extends BaseController
{
    public function index(): string
    {
        return view('Import');
    }

    public function importcsv()
    {
        helper(['form', 'url']);
        
        $file = $this->request->getFile('fichier');
        //$filepath = WRITEPATH . 'uploads/' . $file->store();
        $cheminTemporaire = $file->getTempName();
        $this->import_csv($cheminTemporaire);
       // return redirect()->back()->with('success', 'File imported successfully.');
    }

    public function import_csv($filepath, $ligneDeb = 1, $ligneFin = -1, $separateur = ',', $enclosure = '"')
    {
        if (!file_exists($filepath) || !is_readable($filepath)) {
            return false;
        }

        $donnees = [];
        if (($fichier_handle = fopen($filepath, 'r')) !== false) {
            $nligne = 1;
            while (($ligne = fgetcsv($fichier_handle, 1000, $separateur, $enclosure)) !== false) {
                if ($ligneFin > 0) {
                    if ($nligne >= $ligneDeb && $nligne <= $ligneFin) {
                        $donnees[] = $ligne;
                    } 
                } else {
                    if ($nligne >= $ligneDeb) {
                        $donnees[] = $ligne;
                    }
                }
                $nligne++;
            }
            fclose($fichier_handle);
        }

        //var_dump($donnees);

        for ($i = 1; $i < count($donnees); $i++) {
            // $ligne = $donnees[$i];
            $model = new ImportModel();

            $type_maison = $donnees[$i][0];
            $description = $donnees[$i][1];
            $surface = $donnees[$i][2];
            $code_travaux = $donnees[$i][3];
            $type_travaux = $donnees[$i][4];
            $unite = $donnees[$i][5];
            $prix_unitaire = $donnees[$i][6];
            $quantite = $donnees[$i][7];
            $duree_travaux = $donnees[$i][8];

            $model -> insertCsvData($type_maison, $description, $surface, $code_travaux, $type_travaux, $unite, $prix_unitaire, $quantite, $duree_travaux); 
        }
    }

}
