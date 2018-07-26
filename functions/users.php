<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
require_once '../classes/ville.php';
require_once '../classes/chien.php';
require_once '../classes/race.php';
session_start();

$tabObject = [];
$tabObject2 = [];
$mesChiens = [];

//Se déclenche quand l'user se connecte
if (isset($_POST['btnConnexion'])) {



//fin du déclenchement bouton connexion user
}



$idVille = $_SESSION['utilisateur']->getIdVille();

$sql = $bdd->prepare('SELECT * FROM villes WHERE idVille = :idVille');
$sql->execute(array('idVille' => $idVille));
foreach ($sql as $row) {
    $tabObject = array(
        'id' => $row['idVille'],
        'idDepartement' => $row['id_Departement'],
        'nom' => $row['nomVille'],
        'cp' => $row['cpVille'],
    );
}

$maVille = new Ville();
$maVille->objetSet($tabObject);

$idUser = $_SESSION['utilisateur']->getId();

$sql = $bdd->prepare('SELECT * FROM chiens ch 
LEFT JOIN adherents adh ON adh.idAdherent = ch.id_Adherent 
WHERE idAdherent = :idUser');
$sql->execute(array(':idUser' => $idUser));

foreach ($sql as $row) {
    $tabObject2 = array(
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
    $unChien = new Chien();
    $unChien->objetSet($tabObject2);
    array_push($mesChiens,$unChien);
}