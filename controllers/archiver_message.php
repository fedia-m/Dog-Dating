<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 29/03/18
 * Time: 15:53
 */

require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/messages.php';

session_start();


if ($_GET['messageRecu']){
    //message reçu -> messageArchiveR
    $idMessage = $_GET['idMessage'];
    $sql = $bdd->prepare('UPDATE messages SET messageArchiveD = "1" WHERE idMessage = :idMessage');
    $sql->execute(array('idMessage' => $idMessage));
    header('location:' . BASE_URL . 'views/mes_messages.php');
}

if ($_GET['messageEnvoye']){
    //message envoyé -> messageArchiveE
    $idMessage = $_GET['idMessage'];
    $sql2 = $bdd->prepare('UPDATE messages SET messageArchiveE = "1" WHERE idMessage = :idMessage');
    $sql2->execute(array('idMessage' => $idMessage));
    header('location:' . BASE_URL . 'views/mes_messages.php');
}