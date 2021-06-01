<?php

require_once 'models/front/API.manager.php';
class APIController {

    private $apiManager;

    // On veut qu'au moment ou l'on instancie la classe de L'APIController, j'instancie aussi un APIManager
    public function __construct()
    {
        $this->apiManager = new APIManager();
    }


    public function getReleves(){
        $releves = $this->apiManager->getDBReleves();
        // affichera les données (ss forme de tblx) de la table releves
        return $releves;
    }
    // Affichera les données selon l'ID du releves
    public function getReleves1(){
        $relevesId1 = $this->apiManager->getDBReleves1();
        // affichera les données (ss forme de tblx) de la table releves
        echo "<pre>";
        print_r($relevesId1); 
        echo '</pre>';
    }
    public function getReleves2(){
        $relevesId2 = $this->apiManager->getDBReleves2();
        // affichera les données (ss forme de tblx) de la table releves
        echo "<pre>";
        print_r($relevesId2); 
        echo '</pre>';
    }
    public function getReleves3(){
        $relevesId3 = $this->apiManager->getDBReleves3();
        // affichera les données (ss forme de tblx) de la table releves
        echo "<pre>";
        print_r($relevesId3); 
        echo '</pre>';
    }

    
    public function getStation(){
        $station = $this->apiManager->getDBStation();
        // affichera les données (ss forme de tblx) de la table releves
        echo "<pre>";
        print_r($station); 
        echo '</pre>';
    }

    public function getSonde(){
        $sonde = $this->apiManager->getDBSonde();
        echo "<pre>";
        print_r($sonde); 
        echo '</pre>';
    }

    public function getTemp() {
        $temperature = $this->apiManager->getDBTemp();
        echo "<pre>";
        print_r($temperature); 
        echo '</pre>';
    }

    public function getHumidite() {
        $humidite = $this->apiManager->getDBHumidite();
        echo "<pre>";
        print_r($humidite); 
        echo '</pre>';
    }

    public function getTimestamp() {
        $date = $this->apiManager->getDBTimestamp();
        echo "<pre>";
        print_r($date); 
        echo '</pre>';
       
    }
}
