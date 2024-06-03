<?php
namespace App\Controllers;

use App\Models\ParticipationModel;

class ParticipationController extends BaseController
{
    public function index()
    {
        $data = [
            'content' => view('Pages/formulaire_temps')
        ];
        return view('Layout_Admin/layout',$data);
    }

    
    public function create()
{
    helper(['form', 'url']);

    // Récupérer les données du formulaire
    $id_etape = $this->request->getPost('id_etape');
    $id_coureur = $this->request->getPost('id_coureur');
    $id_equipe = $this->request->getPost('id_equipe');
    $heure_depart = $this->request->getPost('heure_depart');
    $heure_arrivee = $this->request->getPost('heure_arrivee');

    // Préparer les données pour l'insertion
    $data = [
        'id_etape' => $id_etape,
        'id_coureur' => $id_coureur,
        'id_equipe' => $id_equipe,
        'heure_depart' => $heure_depart,
        'heure_arrivee' => $heure_arrivee
    ];

    // Insérer les données
    $participationModel = new ParticipationModel();
    $participationModel->insert($data);

    // Charger la vue avec le formulaire
    $data['validation'] = $this->validator;
    $content = view('Pages/admin_dashboard', $data);

    // Retourner la vue incluant le layout
    return view('Layout_Admin/layout', ['content' => $content]);
}

    
}

?>