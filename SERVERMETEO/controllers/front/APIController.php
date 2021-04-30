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
        echo "<pre>";
        print_r($releves); 
        echo '</pre>';
    }
    public function getSonde(){
        $sonde = $this->apiManager->getDBSonde();
        echo "<pre>";
        print_r($sonde); 
        echo '</pre>';
    }

    public function getStation() {
        $station = $this->apiManager->getDBStation();
        echo "<pre>";
        print_r($station); 
        echo '</pre>';
    }
}