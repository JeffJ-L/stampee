<?php

namespace App\Models;
use App\Models\CRUD;

class Timbre extends CRUD {
    protected $table = "timbre";
    protected $primaryKey = "idTimbre";
    protected $fillable = ['nom', 'date_de_creation', 'couleur', 'pays_d_origine', 'etat', 'dimensions', 'certifie', 'tirage', 'description', 'idUtilisateur'];

    public function getTimbres($idTimbre){
        $sql = "SELECT timbre.*, image.nom AS image_nom 
                FROM timbre 
                LEFT JOIN image ON timbre.idTimbre = image.timbre_idTimbre
                WHERE timbre.idTimbre = :idTimbre";

        $stmt = $this->prepare($sql);
        $stmt->bindParam(':idTimbre', $idTimbre, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // print_r($result);
        // die();
        return $result;
    }


    /**
     * Renvoie les timbres liés à un utilisateur
     * 
     * @param int $idUtilisateur l'ID de l'utilisateur
     * @return array les timbres liés à l'utilisateur
     */
    public function getTimbresByUser($idUtilisateur){
        $sql = "SELECT timbre.*, image.nom AS image_nom 
                FROM timbre 
                LEFT JOIN image ON timbre.idTimbre = image.timbre_idTimbre
                WHERE timbre.idUtilisateur = :idUtilisateur";
    
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':idUtilisateur', $idUtilisateur, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    

}
