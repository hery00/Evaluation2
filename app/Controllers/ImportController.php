<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImportModel;
use CodeIgniter\Files\File;

class ImportController extends BaseController
{
    public function index(): string
    {
        $data = [
            'content' => view('Pages/Import')
        ];
        return view('Layout_Admin/layout',$data);
    }

    public function importcsv()
    {
        helper(['form', 'url']);
        
        $file = $this->request->getFile('fichier');
        //$filepath = WRITEPATH . 'uploads/' . $file->store();
        $cheminTemporaire = $file->getTempName();
        $this->import_csv($cheminTemporaire);
       // return redirect()->back()->with('success', 'File imported successfully.');

        $file2 = $this->request->getFile('fichier2');
        $cheminTemporaire2 = $file2->getTempName();
        $this->import_csv($cheminTemporaire2);
    }

    public function import_csv($filepath, $ligneDeb = 1, $ligneFin = -1, $separateur = ','/*, $enclosure = '"'*/)
    {
        if (!file_exists($filepath) || !is_readable($filepath)) {
            return false;
        }

        $donnees = [];
        if (($fichier_handle = fopen($filepath, 'r')) !== false) {
            $nligne = 1;
            while (($ligne = fgetcsv($fichier_handle, 1000, $separateur)) !== false) {
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

            $etape = $donnees[$i][0];
            $longueur = $donnees[$i][1];
            $nb_coureur = $donnees[$i][2];
            $rang_etape = $donnees[$i][3];
            $date_depart = $donnees[$i][4];
            $heure_depart = $donnees[$i][5];

            $model -> insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart); 
        }
    }

}
