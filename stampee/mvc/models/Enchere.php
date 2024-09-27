<?php

namespace App\Models;

use App\Models\CRUD;

class Enchere extends CRUD {
    protected $table = "enchere";
    protected $primaryKey = "idEnchere";
    protected $fillable = ['Periode_d_activite', 'prix_plancher', 'timbre_idTimbre', 'coup_de_coeur_du_lord', 'estimation'];


    public function getEnchere($idEnchere) {
        $sql = "SELECT enchere.*, 
                       timbre.nom AS timbre_nom, 
                       timbre.description AS timbre_description, 
                       timbre.date_de_creation AS timbre_date_de_creation, 
                       timbre.couleur AS timbre_couleur, 
                       timbre.pays_d_origine AS timbre_pays_d_origine, 
                       timbre.etat AS timbre_etat, 
                       timbre.dimensions AS timbre_dimensions, 
                       timbre.certifie AS timbre_certifie, 
                       timbre.tirage AS timbre_tirage, 
                       image.nom AS image_nom 
                FROM enchere 
                LEFT JOIN timbre ON enchere.timbre_idTimbre = timbre.idTimbre
                LEFT JOIN image ON timbre.idTimbre = image.timbre_idTimbre
                WHERE enchere.idEnchere = :idEnchere";
    
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':idEnchere', $idEnchere, \PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
}
