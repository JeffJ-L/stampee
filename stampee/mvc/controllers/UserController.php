<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Models\Timbre;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController{

    public function __construct(){
        // Auth::session();
    }

    
    // public function generatePassword() {
    //     $user = new User();
    //     $plainPassword = 'LordS87';
    //     $hashedPassword = $user->hashPassword($plainPassword);
    
    //     echo "Hashed password: " . $hashedPassword;
    // }
    
    /**
     * Show the user's profile page with their timbres.
     *
     * @return \App\Providers\View
     */
    public function index() {
        $userId = $_SESSION['user_id'];
        $timbre = new Timbre();
        $timbres = $timbre->getTimbresByUser($userId);
    
        return View::render('user/index', [
            'timbres' => $timbres,
            'userId' => $userId
        ]);
    }
    

    
    public function create() {
        $privilege = new Privilege;
        $privileges = $privilege->select('privilege');
        return View::render('user/create', ['privileges' => $privileges]);
    }

    public function store($data = []){
        // Auth::session();
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('username', $data['username'])->required()->max(50)->isUnique('User');
        $validator->field('password', $data['password'])->min(5)->max(20)->containsUppercase()->containsLowercase();
        $validator->field('email', $data['email'])->email()->required()->max(50)->isUnique('User');
        $validator->field('numero_de_telephone', $data['numero_de_telephone'])->phoneNumberValidation();
        $validator->field('privilege_id', $data['privilege_idprivilege'], 'privilege')->required()->isExist('Privilege');
        if($validator->isSuccess()){
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if($insert){
                return View::redirect('timbre/create');
            }else{
                return View::render('error');
            }

           
        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges'=>$privileges]);
        }
    }
}