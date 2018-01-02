<?php
require_once 'config.php';
class Connexion{
    public function connect(){
        $dsn = 'mysql:host='.hostname.';dbname='.database.';charset=utf8';
        $user = username;
        $password = password;
        try{
            $bdd = new PDO($dsn, $user, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $bdd;
        } catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}