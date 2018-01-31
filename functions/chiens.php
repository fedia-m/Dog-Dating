<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 31/01/18
 * Time: 08:47
 */
//session_start();
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/chien.php';

// déclaration variables
$idUser = $_SESSION['utilisateur']->getId();

$sql = $bdd->prepare('SELECT * FROM chiens ch 
LEFT JOIN adherents adh ON adh.idAdherent = ch.id_Adherent 
WHERE id_Adherent = :idUser');
$sql->execute(array('idUser' => $idUser));
foreach ($sql as $row) {
    $tabObject = array(
        'id' => $row['idChien'],
        'nom' => $row['nomChien'],
        'sexe' => $row['sexeChien'],
        'naissance' => $row['dateNaissanceChien'],
        'lof' => $row['lofChien'],
        'numeroPuce'=> $row['numeroPuce'],
        'photo' => $row['photoChien'],
        'description' => $row['descriptionChien'],
        'idAdherent' => $row['id_Adherent'],
        'idRace' => $row['id_Race'],
    );
}
$meschiens = new Chien();
$meschiens->objetSet($tabObject);
return $meschiens;