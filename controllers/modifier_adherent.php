<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 30/03/18
 * Time: 14:33
 */

require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
session_start();

$idAdherent = $_SESSION['utilisateur']->getId();

$nNom = $_POST[''];
$nPrenom = $_POST[''];
$nPseudo = $_POST[''];
$nMdp = $_POST['motDePasse'];
$nMail = $_POST[''];
$nAdresse = $_POST[''];
$nSexe = $_POST['sexe'];
$nAvatar = $_POST[''];
$nIdVille = $_POST[''];

var_dump($idAdherent);