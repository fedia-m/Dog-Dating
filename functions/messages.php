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
$infoProprioD = [];
$infoProprioE = [];

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

    $idChien = $messageRecu->getId_Chien();

    $sql2 = $bdd->prepare('SELECT * FROM chiens WHERE idChien = :idChien');
    $sql2->execute(array('idChien' => $idChien));

    foreach ($sql2 as $row2) {
        $tabObject4 = array(
            'id' => $row2['idChien'],
            'nom' => $row2['nomChien'],
            'sexe' => $row2['sexeChien'],
            'naissance' => $row2['dateNaissanceChien'],
            'lof' => $row2['lofChien'],
            'numeroPuce' => $row2['numeroPuce'],
            'photo' => $row2['photoChien'],
            'description' => $row2['descriptionChien'],
            'dateAjout' => $row2['dateAjout'],
            'disponible' => $row2['disponible'],
            'idAdherent' => $row2['id_Adherent'],
            'idRace' => $row2['id_Race'],
        );
        $infoChienR = new Chien();
        $infoChienR->objetSet($tabObject4);
        array_push($infoChiensR, $infoChienR);
    }

    $idProprio = $messageRecu->getId_Expediteur();

    $sql2 = $bdd->prepare('SELECT * FROM adherents WHERE idAdherent = :idProprio');
    $sql2->execute(array('idProprio' => $idProprio));

    foreach ($sql2 as $row) {
        $tabObject6 = array(
            'id' => $row['idAdherent'],
            'nom' => $row['nomAdherent'],
            'prenom' => $row['prenomAdherent'],
            'pseudo' => $row['pseudoAdherent'],
            'mdp' => $row['mdpAdherent'],
            'mail' => $row['mailAdherent'],
            'adresse' => $row['adresseAdherent'],
            'sexe' => $row['sexeAdherent'],
            'avatar' => $row['avatarAdherent'],
            'role' => $row['roleAdherent'],
            'idVille' => $row['id_Ville'],
        );
        $infoProprio = new Adherent();
        $infoProprio->objetSet($tabObject6);
        array_push($infoProprioE, $infoProprio);
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

    $idChien = $messageEnvoye->getId_Chien();

    $sql = $bdd->prepare('SELECT * FROM chiens WHERE idChien = :idChien');
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

    $idProprio = $messageEnvoye->getId_Destinataire();

    $sql2 = $bdd->prepare('SELECT * FROM adherents WHERE idAdherent = :idProprio');
    $sql2->execute(array('idProprio' => $idProprio));

    foreach ($sql2 as $row) {
        $tabObject6 = array(
            'id' => $row['idAdherent'],
            'nom' => $row['nomAdherent'],
            'prenom' => $row['prenomAdherent'],
            'pseudo' => $row['pseudoAdherent'],
            'mdp' => $row['mdpAdherent'],
            'mail' => $row['mailAdherent'],
            'adresse' => $row['adresseAdherent'],
            'sexe' => $row['sexeAdherent'],
            'avatar' => $row['avatarAdherent'],
            'role' => $row['roleAdherent'],
            'idVille' => $row['id_Ville'],
        );
        $infoProprio = new Adherent();
        $infoProprio->objetSet($tabObject6);
        array_push($infoProprioD, $infoProprio);
    }

}

