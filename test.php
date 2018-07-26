<?php 
require_once 'config.php';
require_once 'connexion_bdd.php';
require_once 'classes/adherent.php';

$pseudoexistant = Adherent::pseudoExiste($bdd,"ayhann");
var_dump($pseudoexistant);
 ?>


    
    
  }
  
