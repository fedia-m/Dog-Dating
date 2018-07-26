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

$nNom = $_POST['nomUser'];
$nPrenom = $_POST['prenomUser'];
$nPseudo = $_POST['pseudo'];
$nMdp = $_POST['motDePasse'];
$nMail = $_POST['email'];
$nAdresse = $_POST['adresse'];
$nSexe = $_POST['sexe'];
$nAvatar = $_POST['photo'];
$nCodePostal = $_POST['cp'];
$nVille = $_POST['ville'];

var_dump($idAdherent,$nNom,$nPrenom,$nPseudo,'mdp',$nMdp,$nMail,$nAdresse,$nSexe,$nAvatar,$nCodePostal,$nVille);