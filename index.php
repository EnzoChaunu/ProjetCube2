<?php

define("URL", str_replace("index.php", "", (isset($SERVER['HTTPS']) ?  "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/front/APIController.php";
$apiController = new APIController();

try{
    if(empty($_GET['page'])){
        throw new  Exception("la page n'existe pas");
    } else{
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        if(empty($url[0]) ||  empty($url[1])) throw new Exception("La page  n'existe pas");
        switch($url[0]){
            case "front" :
                switch ($url[1]){
                    case "animaux": $apiController->getMeteo(); 
                }
            break;
            case "back" : echo "page backend demandée";
            break;
            default : throw new Exception ("La page n'existe pas");
        }
    }
}