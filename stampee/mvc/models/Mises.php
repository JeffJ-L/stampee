<?php

namespace App\Models;

use App\Models\CRUD;


class Mises extends CRUD {
    protected $table = "mises";
    protected $primaryKey = "idMises";
    protected $fillable = ["utilisateur_idUtilisateur", "enchere_idEnchere", "montant"];

    public function getMises($idEnchere) {
        $sql = "SELECT utilisateur.username, mises.montant, mises.created_at
                FROM mises
                LEFT JOIN utilisateur ON mises.utilisateur_idUtilisateur = utilisateur.idUtilisateur
                WHERE mises.enchere_idEnchere = :idEnchere
                ORDER BY mises.montant DESC";
        
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':idEnchere', $idEnchere, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}