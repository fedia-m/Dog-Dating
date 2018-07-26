<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/messages.php';
session_start();

// déclaration variables
$idMessage = $_GET['idMessage'];


$oMessage = new Message();
$oMessage->setId($idMessage);
$oMessage->deleteMessage($bdd,$oMessage);