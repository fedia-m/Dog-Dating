<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/chien.php';
session_start();

// déclaration variables
$idChien = $_GET['idChien'];


$chienById = new Chien();
$chienById->setId($idChien);
$leChienById = $chienById->dspChien($bdd,$chienById);

if (isset($leChienById)){
    unset($_SESSION['leChienById']);
    $_SESSION['leChienById'] = $leChienById;
    header('location:' . BASE_URL . 'views/contact_proprio.php');
}