<?php

// elle ne sera jamais instanciable dans les autres fichiers
abstract class Model {
    // creation de l'instance de PDO (securité) pour la connexion unique à la bdd
    // on utilisera la meme co à la BDD
    private static $pdo; // notre attribut contiendra la seule instance de PDO de notre appli

    // fonction statique qui va faire la connexion à la bdd
    private static function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=meteo;", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // genere erreur et avertissement pr connexion a la bdd
    }

    // fonction recuperant la bdd | verifiera si pas encore de co à la base (pdo=null)
    protected function getBdd() {
        // test si notre variable pdo est null alors on appel setBdd() (on lancera alors l'instanciation de PDO )
        if(self::$pdo === null) {
            self::setBdd();
        } 
        return self::$pdo;
    }


}