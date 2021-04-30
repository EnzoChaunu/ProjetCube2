<?php

define("URL", str_replace("index.php", "", (isset($SERVER['HTTPS']) ?  "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); //Modification de mon URL : http://localhost/...

require_once "controllers/front/APIController.php";
$apiController = new APIController;
    
try{
    if(empty($_GET['page'])){
        throw new  Exception("la page n'existe pas");
    } else{
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL)); //Securisation du filtre en passant pas la méthode $_GET
        if(empty($url[0]) || empty($url[1])) throw new  Exception("la page n'existe pas"); //si le nombre de "dossiers" ne depasse pas 2 alors la page n'existe pas
        switch($url[0]){
            case "front" :
                switch($url[1]){
                    case "releves": $apiController-> getMeteos();
                    break;
                    case "sonde": echo "Voici les données de nos capteurs";
                    break;
                    case "station": echo "Voici les données de la station";
                    break;
                    default: throw new Exception("la page n'existe pas");
                }
            break;
            case "back" : echo "page back end demandée";
            break;
            default: throw new Exception("la page n'existe pas");
        }
    }
}

catch(Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}