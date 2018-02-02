<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/chien.php';
require_once '../classes/adherent.php';
session_start();
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


if (isset($idChien)) {
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
            'idAdherent' => $row['id_Adherent'],
            'idRace' => $row['id_Race'],
        );
    }
    $unChien->objetSet($tabObject);
    $_SESSION['monChien'] = $unChien;
    header('location:'.BASE_URL.'views/edit_dog.php');
}


//Se déclenche quand l'user ajoute un chien
if (isset($_POST['addDog'])) {

// déclaration variable
    $nomChien = $_POST['nomChien'];
    $idRace = $_POST['raceChien'];
    $sexeChien = $_POST['sexeChien'];
    $naissance = $_POST['dateNaissance'];
    $description = $_POST['description'];
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
    //Si le déplacement de la photo se déroule bien, on execute le sql
    if (move_uploaded_file($_FILES['photoChien']['tmp_name'], $uploadfile)) {
        //DEBUT INSERTION SQL
        $sql = $bdd->prepare("INSERT INTO chiens (nomChien,sexeChien,dateNaissanceChien,lofChien,numeroPuce,photoChien,descriptionChien,id_Adherent,id_Race) VALUES (:nom, :sexe, :naissance, :lof, :numeroPuce, :photo, :description, :idAdherent, :idRace)");
        // :XXX où XXX est l'attribut de la classe en question
        $sql->bindParam(':nom', $nomChien);
        $sql->bindParam(':sexe', $sexeChien);
        $sql->bindParam(':naissance', $naissance);
        $sql->bindParam(':lof', $lof);
        $sql->bindParam( ':numeroPuce', $numChien);
        $sql->bindParam(  ':photo', basename($_FILES['photoChien']['name']));
        $sql->bindParam(     ':description', $description);
        $sql->bindParam(   ':idAdherent', $_SESSION['utilisateur']->getId());
        $sql->bindParam(   ':idRace', $idRace);
        $sql->execute();
        header('location:' . BASE_URL . 'views/page_profil.php');
    }
    //la photo n'as pas été upload
    else{
        echo "Erreur d'upload.";
    }



}
