<?php 
require_once 'config.php';
require_once 'connexion_bdd.php';
require_once 'classes/chien.php';

$id = '';
$nom = "Toto";
$tabObject = array('id' => $id, 'nom' => $nom);
$chien = new Chien();
$chien->objetSet($tabObject);
var_dump($chien);
 ?>


    
    
  }
  
  
  
  while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $oChien = new Chien();
      $tabObject = array(
        'id' => $res['idChien'],
        'nom' => $res['nomChien'],
        'sexe' => $res['sexeChien'],
        'dateNaissance' => $res['dateNaissanceChien'],
        
        );
            $oChien->objetSetId($tabObject);
      $this->oCollChien[] = $oChien;
        }
    
    