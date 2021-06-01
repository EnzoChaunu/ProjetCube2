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

    public function getDBReleves1() {

        $req = " SELECT * FROM releves  WHERE id_releves = 1";
        $stmt = $this->getBdd()->prepare($req); // si connexion true, on prepare la requete
        $stmt->execute();
        $relevesId1 = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll prend en parametre la constante FETCH::ASSOC pour retourner SEULEMENT les champs present dans notre table.
        // fermeture du cursor pour fermer la requete et la co a la bdd
        $stmt->closeCursor();
        return $relevesId1;
    }

    public function getDBReleves2() {

        $req = " SELECT * FROM releves  WHERE id_releves = 2";
        $stmt = $this->getBdd()->prepare($req); // si connexion true, on prepare la requete
        $stmt->execute();
        $relevesId3 = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll prend en parametre la constante FETCH::ASSOC pour retourner SEULEMENT les champs present dans notre table.
        // fermeture du cursor pour fermer la requete et la co a la bdd
        $stmt->closeCursor();
        return $relevesId3;
    }

    public function getDBReleves3() {

        $req = " SELECT * FROM releves WHERE id_releves = 3 ";
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

    
    public function getDBTemp() {

        $req = "SELECT temperature from releves WHERE id_sonde = 1";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        
        $temperature = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $temperature;
    }
          
    public function getDBHumidite() {

        $req = "SELECT humidite from releves WHERE id_sonde = 1";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        
        $humidite = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $humidite;

    }

    public function getDBTimestamp() {

        $req = "SELECT date from releves WHERE id_sonde = 1";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        
        $date = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $date;

    }
}