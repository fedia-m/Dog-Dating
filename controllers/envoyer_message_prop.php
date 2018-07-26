<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 02/03/18
 * Time: 09:17
 */
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/messages.php';
require_once '../classes/chien.php';
require_once '../classes/adherent.php';
session_start();

if (isset($_POST['btnEnvoyer'])){
    $idExp = $_SESSION['utilisateur']->getId();
    $idDest = $_SESSION['leChienById']->getIdAdherent();
    $idChien = $_SESSION['leChienById']->getId();
    $objet = htmlentities($_POST['sujet']);
    $contenu = htmlentities($_POST['message']);


    $message = new Message();

    $message->setId_Expediteur($idExp);
    $message->setId_Destinataire($idDest);
    $message->setId_Chien($idChien);
    $message->setObjetMessage($objet);
    $message->setContenuMessage($contenu);
    $message->setMessageArchiveE("0");
    $message->setMessageArchiveD("0");
    $message->envoyerMessage($bdd,$message);
    header('location:' . BASE_URL . 'views/mes_messages.php');
}