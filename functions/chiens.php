<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/chien.php';

$tabObject = [];
$unChien = new Chien();

if (!empty($_GET['idChien'])) {
    $idChien = $_GET['idChien'];
}

if (!empty($_GET['deleteDog'])) {
    $deleteDog = true;
}

if (!empty($_GET['editDog'])) {
    $editDog = true;
}



if ( isset($idChien)){
    $sql = $bdd->prepare('SELECT * FROM chiens WHERE idChien = :idChien');
    $sql->execute(array('idChien' => $idChien));

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
    session_start();
    $unChien->objetSet($tabObject);
    $_SESSION['monChien'] = $unChien;
    header('location:'.BASE_URL.'views/edit_dog.php');
}
?>
