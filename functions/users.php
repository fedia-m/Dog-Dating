<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';


//Se déclenche quand l'user se connecte
if (isset($_POST['btnConnexion'])) {

// déclaration variables
$login = $_POST['login'];
$password = sha1(sha1($_POST['motDePasse']));
var_dump($login);
var_dump($password);


$sql = $bdd->prepare('SELECT * FROM adherents WHERE pseudoAdherent = :pseudo and mdpAdherent = :mdp');

$sql->execute(array('pseudo' => $login, 'mdp' => $password));

//L'utilisateur est reconnu
foreach ($sql as $row) {
    $_SESSION['utilisateur'] = new Adherent();
    $_SESSION['utilisateur']->objetSetId($row['idAdherent'],$row['nomAdherent'],$row['prenomAdherent'],$row['pseudoAdherent'],$row['mdpAdherent'],$row['mailAdherent'],$row['adresseAdherent'],$row['sexeAdherent'],$row['avatarAdherent'],$row['roleAdherent'],$row['id_Ville']);
  	header('Location: ../index.php');
  	exit();
  	break;
}

//fin du déclenchement bouton connexion user
}


//Se déclenche quand l'user s'inscrit
if (isset($_POST['creerUser'])) {

// déclaration variable
$prenom = $_POST['prenomUser'];
$nom = $_POST['nomUser'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$mdp = sha1(sha1($_POST['motDePasse']));
$mdp2 = sha1(sha1($_POST['motDePasse2']));

//lorsque la confirmation du mot de passe est différent du mdp saisi
if ($mdp2 != $mdp) {
	echo 'pas le meme mdp';
}
else {
//Mdp confirmé donc on lance l'inscription
//Vérification si le pseudo existe déjà dans la base
$sql = $bdd->prepare('SELECT * FROM adherents WHERE pseudoAdherent = :pseudo');

$sql->execute(array('pseudo' => $pseudo));

//parcours de la base
foreach ($sql as $row) {
    echo 'Oups, pseudo déjà utilisé.';
}
} //fin du else (meme mot de passe)
//fin du déclenchement bouton inscription user
}