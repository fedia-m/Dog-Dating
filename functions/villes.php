<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 30/01/18
 * Time: 13:31
 */
session_start();
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
require_once '../classes/ville.php';

// déclaration variables
$idVille = '376';

$sql = $bdd->prepare('SELECT * FROM villes WHERE idVille = :idVille');
$sql->execute(array('idVille' => $idVille));
foreach ($sql as $row) {
    $tabObject = array(
        'idVille' => $row['idVille'],
        'idDepartement' => $row['id_Departement'],
        'nomVille' => $row['nomVille'],
        'cpVille' => $row['cpVille'],
    );
}
//var_dump($_SESSION['villeUser']);
$_SESSION['villeUser'] = ["test"];

