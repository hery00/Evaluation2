<?php

namespace App\Models;

use CodeIgniter\Model;

class ImportModel extends Model
{
    protected $table = 'import_etape';

    protected $allowedFields = ['etape', 'longueur', 'nb_coureur', 'rang_etape', 'date_depart', 'heure_depart'];

    // Méthode pour insérer les données
    // public function insertCsvData($data)
    // {
    //     return $this->insert($data);
    // }
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

            return $donnees;

            // for ($i = 1; $i < count($donnees); $i++) {
            //     // $ligne = $donnees[$i];
            //     $model = new ImportModel();

            //     $etape = $donnees[$i][0];
            //     $longueur = $donnees[$i][1];
            //     $nb_coureur = $donnees[$i][2];
            //     $rang_etape = $donnees[$i][3];
            //     $date_depart = $donnees[$i][4];
            //     $heure_depart = $donnees[$i][5];

            //     $model -> insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart); 
            // }
        }
    public function insertCsvData($etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart)
    {
        $sql = "INSERT INTO import_etape VALUES ('%s','%d','%d','%d','%s','%s')";
        $sql = sprintf($sql,$etape, $longueur, $nb_coureur, $rang_etape, $date_depart, $heure_depart);
        echo $sql;
        $this->db->query($sql);

    }


}
