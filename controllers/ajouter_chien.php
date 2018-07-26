<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/race.php';
require_once '../classes/chien.php';
require_once '../classes/adherent.php';
session_start();


// déclaration variable
$nomChien = $_POST['nomChien'];
$idRace = $_POST['raceChien'];
$sexeChien = $_POST['sexeChien'];
$naissance = $_POST['dateNaissance'];
$description = $_POST['description'];
$dateAjout = date("Y-m-d");
$disponible = $_POST['disponible'];
//lof pas obligé donc on crée la variable seulement si l'user a renseigner
if (!empty($_POST['lofChien'])) {
    $lof = $_POST['lofChien'];
} else {
    $lof = '';
}
//numero puce / tatouage pas obligé donc on crée la variable seulement si l'user a renseigner
if (!empty($_POST['numChien'])) {
    $numChien = str_replace(' ', '', $_POST['numChien']); //enlève les espaces du numéro de puce
} else {
    $numChien = '';
}
// DEBUT PARTIE UPLOAD PHOTO
$uploaddir = "..\images\\" . $_SESSION['utilisateur']->getId() . "\\dogs\\";
$uploadfile = $uploaddir . basename($_FILES['photoChien']['name']);

//Si le déplacement de la photo se déroule bien, on crée l'objet et on execute le sql
if (move_uploaded_file($_FILES['photoChien']['tmp_name'], $uploadfile)) {
    $oChien = new Chien();
    $tabObject = array(
        'nom' => $nomChien,
        'sexe' => $sexeChien,
        'naissance' => $naissance,
        'lof' => $lof,
        'numeroPuce' => $numChien,
        'photo' => basename($_FILES['photoChien']['name']),
        'description' => $description,
        'dateAjout' => $dateAjout,
        'disponible' => $disponible,
        'idAdherent' => $_SESSION['utilisateur']->getId(),
        'idRace' => $idRace,
    );
    // on set l'objet
    foreach($tabObject as $key => $val)
    {
        $set = "set".ucfirst($key);
        $oChien->$set($val);
    }

    //On déclenche la méthode
    $oChien->addDog($bdd,$oChien);
}
//la photo n'as pas été uploadée
else{
    $erreurMessage = 1;
    header('location:'.BASE_URL.'views/add_dog.php?e='.sha1($erreurMessage));
}