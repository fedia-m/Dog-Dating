<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/chien.php';
session_start();

// déclaration variables
$idChien = $_GET['idChien'];


$oChien = new Chien();
$oChien->setId($idChien);
$oChien->deleteDog($bdd,$oChien);