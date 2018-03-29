<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/race.php';
require_once '../classes/chien.php';
require_once '../classes/adherent.php';

session_start();
$tabObject = [];
$tabObject2 = [];
$unChien = new Chien();
$raceChien = new Race();

if (!empty($_GET['idChien'])) {
    $idChien = $_GET['idChien'];
}

if (!empty($_GET['deleteDog'])) {
    $deleteDog = true;
}

if (!empty($_GET['editDog'])) {
    $editDog = true;
}

if (!empty($_GET['dogProfil'])) {
    $dogProfil = true;
}

if (isset($idChien) && $editDog ){
    $sql = $bdd->prepare('SELECT * FROM chiens WHERE idChien = :idChien');
    $sql->execute(array('idChien' => $idChien));

    foreach ($sql as $row) {
        $tabObject = array(
            'id' => $row['idChien'],
            'nom' => $row['nomChien'],
            'sexe' => $row['sexeChien'],
            'naissance' => $row['dateNaissanceChien'],
            'lof' => $row['lofChien'],
            'numeroPuce' => $row['numeroPuce'],
            'photo' => $row['photoChien'],
            'description' => $row['descriptionChien'],
            'dateAjout' => $row['dateAjout'],
            'disponible' => $row['disponible'],
            'idAdherent' => $row['id_Adherent'],
            'idRace' => $row['id_Race'],
        );
    }
    $unChien->objetSet($tabObject);
    $_SESSION['monChien'] = $unChien;
    header('location:'.BASE_URL.'views/edit_dog.php');
}

if (isset($idChien) && $dogProfil ){
    unset($_SESSION['monChien']);
    unset($_SESSION['raceChien']);

    $sql = $bdd->prepare('SELECT * FROM chiens WHERE idChien = :idChien');
    $sql->execute(array('idChien' => $idChien));

    foreach ($sql as $row) {
        $tabObject = array(
            'id' => $row['idChien'],
            'nom' => $row['nomChien'],
            'sexe' => $row['sexeChien'],
            'naissance' => $row['dateNaissanceChien'],
            'lof' => $row['lofChien'],
            'numeroPuce' => $row['numeroPuce'],
            'photo' => $row['photoChien'],
            'description' => $row['descriptionChien'],
            'dateAjout' => $row['dateAjout'],
            'disponible' => $row['disponible'],
            'idAdherent' => $row['id_Adherent'],
            'idRace' => $row['id_Race'],
        );
    }
    $unChien->objetSet($tabObject);
    $idRace = $unChien->getIdRace();
    $_SESSION['monChien'] = $unChien;

    $sql2 = $bdd->prepare('SELECT * FROM races WHERE idRace = :idRace');
    $sql2->execute(array('idRace' => $idRace));
    foreach ($sql2 as $row) {
        $tabObject2 = array(
            'id' => $row['idRace'],
            'nom' => $row['nomRace']
        );
    }
    $raceChien = new Race();
    $raceChien->objetSet($tabObject2);
    $_SESSION['raceChien'] = $raceChien;

    if ($_GET['m']== true){
        header('location:'.BASE_URL.'views/dog_profil.php?m=true');
    } else {
        header('location:'.BASE_URL.'views/dog_profil.php?m=false');
    }
}

