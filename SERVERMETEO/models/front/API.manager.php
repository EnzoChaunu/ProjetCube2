<?php
// liaison faite pr heritage de la connexion Bdd
require_once 'models/Model.php';

class APIManager extends Model{

    public function getDBReleves() {

        $req = " SELECT * FROM releves ";
        $stmt = $this->getBdd()->prepare($req); // si connexion true, on prepare la requete
        $stmt->execute();
        $releves = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll prend en parametre la constante FETCH::ASSOC pour retourner SEULEMENT les champs present dans notre table.
        // fermeture du cursor pour fermer la requete et la co a la bdd
        $stmt->closeCursor();
        return $releves;
    }

    public function getDBSonde() {

        $req = "SELECT * from sonde ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        
        $sonde = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $sonde;
    }

    public function getDBStation() {

        $req = "SELECT * from station ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        
        $station = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $station;
    }

}