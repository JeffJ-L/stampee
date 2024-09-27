<?php

namespace App\Models;
use App\Models\CRUD;

class User extends CRUD{
    protected $table = "utilisateur";
    protected $primaryKey = "idUtilisateur";
    protected $fillable = ['username', 'name', 'email', 'password', 'numero_de_telephone', 'privilege_idprivilege'];

    public function hashPassword($password, $cost = 10){
        $options = [
            'cost' => $cost
        ];
        
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function checkUser($username, $password){
        $user = $this->unique('username', $username);
        if($user){
            if(password_verify($password, $user['password'])){
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['idUtilisateur'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['privilege_id'] = $user['privilege_idprivilege'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    /**
     * Retourne un utilisateur par son id ou tous les utilisateurs si $id est null.
     *
     * @param int|null $id
     * @return array|null
     */
    public function getUsers($id = null) {
        if ($id) {
            $sql = "SELECT * FROM utilisateur WHERE idUtilisateur = :id";
            $stmt = $this->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $sql = "SELECT * FROM utilisateur";
            $stmt = $this->query($sql);
            return $stmt->fetchAll();
        }
    }
}