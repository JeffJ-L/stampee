<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Timbre;
use App\Models\Privilege;
use App\Providers\View;
use App\Models\Image;
use App\Providers\Validator;
use App\Providers\Auth;

class TimbreController {
    public function index() {
        $timbre = new Timbre();
        $timbres = $timbre->select();
        return View::render('timbre/index', ['timbres' => $timbres]);
    }

    public function create() {
        return View::render('timbre/create');
    }

    public function store($data) {
        Auth::session();
    
        $validator = new Validator;
    
        // Validation des champs
        $validator->field('nom', $data['nom'])->required()->min(3)->max(50);
        $validator->field('date_de_creation', $data['date_de_creation'])->required();
        $validator->field('tirage', $data['tirage'])->required();
    
        if ($validator->isSuccess()) {
            // Enregistrement des informations dans la base de données
            $idUtilisateur = $_SESSION['user_id'];
            $data['idUtilisateur'] = $idUtilisateur;
            $timbre = new Timbre();
            $timbre_id = $timbre->insert($data);
            
            // Validation des images et enregistrement des images dans la base de données
            if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $new_image_name = $validator->field('images', $_FILES['images']['name'][$key])
                        ->validateSize($_FILES['images']['size'][$key])
                        ->image_name_check($_FILES['images']['name'][$key], $_FILES['images']['tmp_name'][$key]);
    
                    if ($new_image_name) {
                        $imagePaths[] = $new_image_name;

                        $image = new Image();
                        $image->insert([
                            'nom' => $imagePaths[$key],
                            'timbre_idTimbre' => $timbre_id
                        ]);
                    }
                }
            }

            return View::redirect('timbre/show?id=' . $timbre_id);

        } else {
            $errors = $validator->getErrors();
            return View::render('timbre/create', ['errors' => $errors, 'timbre' => $data]);
        }
    }


    
    /**
     * Affiche un timbre en fonction de son ID
     *
     * @param array $data contenant l'ID du timbre
     * @return void
     */
    public function show($data = []) {
        // print_r($data);
        // die();
        if(isset($data['id']) && $data['id'] != null){
            $timbre = new Timbre();
            $selectId = $timbre->selectId($data['id']);

            if($selectId){
                $timbres = $timbre->getTimbres($data['id']);
                return View::render('timbre/show', [
                    'timbre' => $selectId,
                    'timbres' => $timbres,
                ]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['msg' => 'Aucun timbre trouvé!']);
        }    
    }
}
