<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
require_once '../classes/ville.php';
require_once '../classes/chien.php';

session_start();

$tabObject = [];
$tabObject2 = [];
$mesChiens = [];

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
	$tabObject = array('id' => $row['idAdherent'], 
	'nom' => $row['nomAdherent'],
	'prenom' => $row['prenomAdherent'],
	'pseudo' => $row['pseudoAdherent'],
	'mdp' => $row['mdpAdherent'],
	'mail' => $row['mailAdherent'],
	'adresse' => $row['adresseAdherent'],
	'sexe' => $row['sexeAdherent'],
	'avatar' => $row['avatarAdherent'],
	'role' => $row['roleAdherent'],
	'idVille' => $row['id_Ville'],
	);
    $_SESSION['utilisateur'] = new Adherent();
    $_SESSION['utilisateur']->objetSet($tabObject);
  	header('Location: ../index.php');
  	//var_dump($_SESSION['utilisateur']);

}

//fin du déclenchement bouton connexion user
}


//Se déclenche quand l'user s'inscrit
if (isset($_POST['creerUser'])) {

// déclaration variable
$pseudoexistant = false;
$prenom = $_POST['prenomUser'];
$nom = $_POST['nomUser'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['email'];
$mdp = sha1(sha1($_POST['motDePasse']));
$mdp2 = sha1(sha1($_POST['motDePasse2']));
$sexe = $_POST['sexe'];
$role = '0'; //Lorsqu'on inscrit quelqu'un, on met son role a 0 : utilisateur sans droits

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
    $pseudoexistant = true;
}

//On commence l'ajout dans la base si le pseudo n'existe pas, donc le boolean a false
if ($pseudoexistant == false) {
$sql = $bdd->prepare("INSERT INTO adherents (nomAdherent,prenomAdherent,pseudoAdherent,mdpAdherent,mailAdherent,sexeAdherent,roleAdherent) VALUES (:nom, :prenom, :pseudo, :mdp, :mail, :sexe, :role)");
$sql->bindParam(':nom', $nom);
$sql->bindParam(':prenom', $prenom);
$sql->bindParam(':pseudo', $pseudo);
$sql->bindParam(':mdp', $mdp);
$sql->bindParam(':mail', $mail);
$sql->bindParam(':sexe', $sexe);
$sql->bindParam(':role', $role);
$sql->execute();
$userInscrit = true;
header('location:'.BASE_URL.'views/bienvenue.php');
} //fin du if (pseudo n'existe pas)
} //fin du else (meme mot de passe)
//fin du déclenchement bouton inscription user
}

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

$maVille = new Ville();
$maVille->objetSet($tabObject);

$idUser = $_SESSION['utilisateur']->getId();

$sql = $bdd->prepare('SELECT * FROM chiens ch 
LEFT JOIN adherents adh ON adh.idAdherent = ch.id_Adherent 
WHERE idAdherent = :idUser');
$sql->execute(array(':idUser' => $idUser));

foreach ($sql as $row) {
    $tabObject2 = array(
        'id' => $row['idChien'],
        'nom' => $row['nomChien'],
        'sexe' => $row['sexeChien'],
        'naissance' => $row['dateNaissanceChien'],
        'lof' => $row['lofChien'],
        'numeroPuce'=> $row['numeroPuce'],
        'photo' => $row['photoChien'],
        'description' => $row['descriptionChien'],
        'idAdherent' => $row['id_Adherent'],
        'idRace' => $row['id_Race'],
    );
    $unChien = new Chien();
    $unChien->objetSet($tabObject2);
    array_push($mesChiens,$unChien);
}

return $maVille;
return $mesChiens;