<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Enchere;
use App\Models\Mises;
use App\Providers\View;
use App\Providers\Auth;



class MisesController {

    public function store($data) {
        if(isset($data['enchere_id']) && isset($data['montant'])) {
            $mises = new Mises();

            $userId = $_SESSION['user_id'];

            $detailsMises = [
                'utilisateur_idUtilisateur' => $userId,
                'enchere_idEnchere' => $data['enchere_id'],
                'montant' => $data['montant']
            ];
            $mises->insert($detailsMises);

            
            return View::redirect('enchere/show?id=' . $data['enchere_id']);
        }else{
            return View::render('error');
        }
    }
}

