<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 01/03/18
 * Time: 09:48
 */

require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/messages.php';
require_once '../classes/adherent.php';
require_once '../classes/chien.php';

session_start();

$tabObject = [];
$tabObject2 = [];
$messageEnvoyes = [];
$messageRecus = [];
$infoChiens = [];
$infoChiensR = [];

$idDest = $_SESSION['utilisateur']->getId();
$idExp = $_SESSION['utilisateur']->getId();

//tous les messages destinataire
$sql = $bdd->prepare('SELECT * FROM messages WHERE id_Destinataire = :idDest');
$sql->execute(array('idDest' => $idDest));

foreach ($sql as $row) {
    $tabObject = array(
        'id' => $row['idMessage'],
        'id_Expediteur' => $row['id_Expediteur'],
        'id_Destinataire' => $row['id_Destinataire'],
        'id_Chien' => $row['id_Chien'],
        'objetMessage' => $row['objetMessage'],
        'contenuMessage' => $row['contenuMessage'],
        'messageArchiveE' => $row['messageArchiveE'],
        'messageArchiveD' => $row['messageArchiveD'],
    );
    $messageRecu = new Message();
    $messageRecu->objetSet($tabObject);
    array_push($messageRecus,$messageRecu);

    $idChien = $messageRecu->getIdChien();

    $sql = $bdd->prepare('SELECT * FROM chiens WHERE id_Chien = :idChien');
    $sql->execute(array('idChien' => $idChien));
    foreach ($sql as $row) {
        $tabObject4 = array(
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
        $infoChienR = new Chien();
        $infoChienR->objetSet($tabObject4);
        array_push($infoChiensR, $infoChienR);
    }
}


//tous les messsages expéditeur
$sql = $bdd->prepare('SELECT * FROM messages WHERE id_Expediteur = :idExp');
$sql->execute(array('idExp' => $idExp));

foreach ($sql as $row) {
    $tabObject2 = array(
        'id' => $row['idMessage'],
        'id_Expediteur' => $row['id_Expediteur'],
        'id_Destinataire' => $row['id_Destinataire'],
        'id_Chien' => $row['id_Chien'],
        'objetMessage' => $row['objetMessage'],
        'contenuMessage' => $row['contenuMessage'],
        'messageArchiveE' => $row['messageArchiveE'],
        'messageArchiveD' => $row['messageArchiveD'],
    );
    $messageEnvoye = new Message();
    $messageEnvoye->objetSet($tabObject2);
    array_push($messageEnvoyes, $messageEnvoye);

    $idChien = $messageEnvoye->getIdChien();

    $sql = $bdd->prepare('SELECT * FROM chiens WHERE id_Chien = :idChien');
    $sql->execute(array('idChien' => $idChien));

    foreach ($sql as $row) {
        $tabObject3 = array(
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
        $infoChien = new Chien();
        $infoChien->objetSet($tabObject3);
        array_push($infoChiens,$infoChien);
    }

}