<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FinitionModel;
use App\Models\MaisonModel;
use App\Models\DevisModel;
use App\Models\ClientModel;
use App\Models\DevisDetailsModel;
use App\Models\DevisMaisonModel;
use App\Models\TabledevisDetailsModel;

class ClientController extends BaseController
{
    public function log()
    {
        return view('Pages/loginclient');
    }
    public function authentification()
    {
        $clientModel = new ClientModel();
            $numTelephone = $this->request->getPost('numero');
            $client = $clientModel->where('num_telephone', $numTelephone)->first();
            if ($client) {
                $session = session();
                $session->set('client_id', $client['id_client']);
                return redirect()->to('clientcontroller/listdevis');
            }else {
                return redirect()->to('formcontroller/log?data=1')->with('error', 'Numéro de téléphone incorrect.');
            }
      }

        public function listdevis()
        {
            $model = new DevisMaisonModel();
            $data['devis'] = $model->distinct()->findAll();
            $data = [
                'content' => view('Pages/devisclient',$data)
            ];
            return view('Layout/layoutclient', $data);
        }

        public function newdevis()
        {
            $model = new FinitionModel();
            $data['finitions'] = $model->findAll();
            $maisonModel = new MaisonModel();
            $data['maisons'] = $maisonModel->findAll();
            return view('Pages/insertdevis',$data);
        }

        public function insertdevis()
        {
            $devis = new DevisModel();
            $details= new DevisDetailsModel();
            $tabledetails= new DevisDetailsModel();
            $datedebut = $this->request->getGet('date_debut');
            $idfinition = $this->request->getVar('idfinition');
            $idmaison = $this->request->getGet('id_maison');
            $idclient = session()->get('client_id');
            $data = [
                'id_maison' => $idmaison,
                'id_finition' => $idfinition,
                'id_client' => $idclient,
                'date_debut' => $datedebut
            ];

            $insertedId = $devis->insert($data);

            if ($insertedId) {
                // Récupérer les données à partir de la vue avec le modèle $detailsModel
                $detailsData = $details->findAll();
        
                // Insérer les données dans la table identique à la vue avec le modèle $tabledetailsModel
                foreach ($detailsData as $detail) {
                    $tabledetails->insert($detail);
                }
        
                return redirect()->to('clientcontroller/listdevis');
            } else {
                return redirect()->to('/')->with('error_message', 'Échec de l\'insertion du devis');
            }
    } 

   
}

