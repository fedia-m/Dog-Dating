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

    $message->setIdExpediteur($idExp);
    $message->setIdDestinataire($idDest);
    $message->setIdChien($idChien);
    $message->setObjet($objet);
    $message->setContenu($contenu);
    //var_dump($message);
    $message->envoyerMessage($bdd,$message);
    header('location:' . BASE_URL . 'views/mes_messages.php');
}