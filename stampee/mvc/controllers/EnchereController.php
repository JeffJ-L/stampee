<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Timbre;
use App\Models\Privilege;
use App\Models\Enchere;
use App\Models\CRUD;
use App\Models\Mises;
use App\Providers\View;
use App\Models\Image;
use App\Providers\Validator;
use App\Providers\Auth;

class EnchereController{
    public function index($data = []) {
        $enchere = new Enchere();

        if (isset($data['filter']) && $data['filter'] === 'mesEncheres' && isset($_SESSION['user_id'])) {
            $encheres = $enchere->getUserEncheres($_SESSION['user_id']);
        } else {
            $encheres = $enchere->getAllEncheres();
        }
    
        return View::render('enchere/index', ['encheres' => $encheres]);
    }
    

    // public function showEncheres() {
    //     $enchere = new Enchere();
    //     $encheres = $enchere->getAllEncheres();
    //     return View::render('enchere/', ['encheres' => $encheres]);
    // }
    



    public function create() {

        $userId = $_SESSION['user_id'];
        $timbre = new Timbre();
        $userTimbres = $timbre->getTimbresByUser($userId);

        return View::render('enchere/create', [
            'timbres' => $userTimbres
        ]);
    }


    public function show($data = []) {
        if (isset($data['id']) && $data['id'] != null) {
            $enchere = new Enchere();
            $enchereDetails = $enchere->getEnchere($data['id']);

            if ($enchereDetails) {
                $userId = $_SESSION['user_id'];
                $mises = new Mises();
                $historiqueMises = $mises->getMises($data['id']);
                return View::render('enchere/show', [
                    'enchere' => $enchereDetails,
                    'userId' => $userId,
                    'mises' => $historiqueMises
                ]);
            } else {
                return View::render('error', ['msg' => 'Enchère introuvable!']);
            }
        } else {
            return View::render('error', ['msg' => 'Aucun ID saisi!']);
        }
    }


    public function store($data) {
        $enchere = new Enchere();
        $enchere_id = $enchere->insert($data);

        return View::redirect('enchere/show?id=' . $enchere_id);
    }

}

?>