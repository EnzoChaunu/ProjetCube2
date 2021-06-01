<<<<<<< HEAD
<?php

define("URL", str_replace("index.php", "", (isset($SERVER['HTTPS']) ?  "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); //Modification de mon URL : http://localhost/...

try{
    if(empty($_GET['page'])){
        throw new  Exception("la page n'existe pas");
    } else{
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));//Securisation du filtre en passant pas la méthode $_GET
        if(empty($url[0]) || empty($url[1])) throw new  Exception("la page n'existe pas");//si le nombre de "dossiers" ne depasse pas 2 alors la page n'existe pas
        switch($url[0]){
            case "front" :
                switch($url[1]){
                    case "releves": echo "Voici les relevés ".$url[2]." demandées";
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
=======
<?php

// chemin ABSOLU | fichier index = routeur |
// Constante définie permettant de crer le chemin absolu pr l'acces à nos ressources (img, code etc)
// la constante URL sera remplacé par notre index.php avec devant hhtps / http suivi de mon API
define("URL", str_replace("index.php", "", (isset($SERVER['HTTPS']) ?  "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); //Modification de mon URL : http://localhost/...


require_once "controllers/front/APIController.php";
$apiController = new APIController(); // nouvelle instance pr utiliser les fonctions de la classe API 

try{
    if(empty($_GET['page'])){
        throw new  Exception("la page n'existe pas");
    } else{
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));//Securisation du filtre en passant pas la méthode $_GET
        if(empty($url[0]) || empty($url[1])) throw new  Exception("la page n'existe pas");//si le nombre de "dossiers" ne depasse pas 2 alors la page n'existe pas
        switch($url[0]){
            case "front" :
                switch($url[1]){
                    case "releves":  $apiController->getReleves();
                    break;
                    case "sonde": $apiController->getSonde();
                    break;
                    case "station": $apiController->getStation();
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
>>>>>>> 37f96e5c6dffb550d949d24b12752af09dd43f23
}