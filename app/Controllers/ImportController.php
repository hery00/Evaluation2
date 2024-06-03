<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImportModel;
use App\Models\ImportEtapeModel;
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
        $importModel = new ImportModel();
        
        $file = $this->request->getFile('fichier');
        //$filepath = WRITEPATH . 'uploads/' . $file->store();
        $cheminTemporaire = $file->getTempName();
        
       // return redirect()->back()->with('success', 'File imported successfully.');

        $file2 = $this->request->getFile('resultat');
        $cheminTemporaire2 = $file2->getTempName();

        $tab1 = $importModel -> import_csv($cheminTemporaire);
        $tab2 = $importModel -> import_csv($cheminTemporaire2);

        for ($i = 1; $i < count($tab1); $i++) 
        {
            $ligne = $tab1[$i];
            $etapemodel = new ImportEtapeModel();

            $etape = $tab1[$i][0];
            $longueur = $tab1[$i][1];
            $nb_coureur = $tab1[$i][2];
            $rang_etape = $tab1[$i][3];
            $date_depart = $tab1[$i][4];
            $heure_depart = $tab1[$i][5];

            $etapemodel -> insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart); 
        }
        //var_dump($tab2);
    }

    public function import_points()
    {
        helper(['form', 'url']);
        $importModel = new ImportModel();
        
        $file = $this->request->getFile('fichier');
        //$filepath = WRITEPATH . 'uploads/' . $file->store();
        $cheminTemporaire = $file->getTempName();
        
       // return redirect()->back()->with('success', 'File imported successfully.');

        $tab1 = $importModel -> import_csv($cheminTemporaire);
        var_dump($tab1);

    }
    public function link_point()
    {
        $data = [
            'content' => view('Pages/Import_Points')
        ];
        return view('Layout_Admin/layout',$data);
    }


    //     for ($i = 1; $i < count($donnees); $i++) {
    //         // $ligne = $donnees[$i];
    //         $model = new ImportModel();

    //         $etape = $donnees[$i][0];
    //         $longueur = $donnees[$i][1];
    //         $nb_coureur = $donnees[$i][2];
    //         $rang_etape = $donnees[$i][3];
    //         $date_depart = $donnees[$i][4];
    //         $heure_depart = $donnees[$i][5];

    //         $model -> insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart); 
    //     }
    // }

}
