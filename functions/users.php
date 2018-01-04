<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';


//Se déclenche quand l'user se connecte
if (isset($_POST['btnConnexion'])) {
	
$login = $_POST['login'];
$password = sha1(sha1($_POST['motDePasse']));
var_dump($login);
var_dump($password);


$stmt = $bdd->prepare('SELECT * FROM adherents WHERE pseudoAdherent = :pseudo and mdpAdherent = :mdp');

$stmt->execute(array('pseudo' => $login, 'mdp' => $password));

//L'utilisateur est reconnu
foreach ($stmt as $row) {
    $_SESSION['utilisateur'] = new Adherent();
    $_SESSION['utilisateur']->objetSetId($row['idAdherent'],$row['nomAdherent'],$row['prenomAdherent'],$row['pseudoAdherent'],$row['mdpAdherent'],$row['mailAdherent'],$row['adresseAdherent'],$row['sexeAdherent'],$row['avatarAdherent'],$row['roleAdherent'],$row['id_Ville']);
  	header('Location: ../index.php');
  	exit();
  	break;
}

//fin du déclenchement bouton connexion user
}