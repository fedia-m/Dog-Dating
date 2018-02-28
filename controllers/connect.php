<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
session_start();

// déclaration variables
$pseudo = $_POST['pseudo'];
$password = sha1(sha1($_POST['motDePasse']));

$oAdherent = new Adherent();
$oAdherent->setPseudo($pseudo);
$oAdherent->setMdp($password);
$oAdherent->connect($bdd,$oAdherent);