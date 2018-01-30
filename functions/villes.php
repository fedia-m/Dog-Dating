<?php
session_start();
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
require_once '../classes/ville.php';

// déclaration variables
$idVille = $_SESSION['utilisateur']->getIdVille();

$sql = $bdd->prepare('SELECT * FROM villes WHERE idVille = :idVille');
$sql->execute(array('idVille' => $idVille));
foreach ($sql as $row) {
    $tabObject = array(
        'id' => $row['idVille'],
        'idDepartement' => $row['id_Departement'],
        'nom' => $row['nomVille'],
        'cp' => $row['cpVille'],
    );
}
$maville = new Ville();
$maville->objetSet($tabObject);
return $maville;

