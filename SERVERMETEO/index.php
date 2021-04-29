<?php

define("URL", str_replace("index.php", "", (isset($SERVER['HTTPS']) ?  "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); //Modification de mon URL : http://localhost/...

require_once "controllers/front/APIController.php";
$apiController = new APIController();

try{
    if(empty($_GET['page'])){
        throw new  Exception("la page n'existe pas");
    } else{
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));//Securisation du filtre en passant pas la méthode $_GET
        echo "<pre>";
        print_r($url);
        echo "<pre>";
        echo "La page demandée est : ".$_GET['page'];
    }
}

catch(Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}