<?php
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/adherent.php';
session_start();


//Déclaration variable
$prenom = $_POST['prenomUser'];
$nom = $_POST['nomUser'];
$pseudo = $_POST['pseudo'];
$_SESSION['pseudo'] = $pseudo; //On va l'utiliser dans la page de bienvenu pour que l'utilsateur saissise juste son mdp
$mdp = sha1(sha1($_POST['motDePasse']));
$mdp2 = sha1(sha1($_POST['motDePasse2']));
$mail = $_POST['email'];
$sexe = $_POST['sexe'];
$role = '0'; //Lorsqu'on inscrit quelqu'un, on met son role a 0 : utilisateur sans droits

//lorsque la confirmation du mot de passe est différent du mdp saisi
if ($mdp2 != $mdp) {
    echo 'pas le meme mdp';
}
//Mdp confirmé donc on lance l'inscription
else {
//Vérification si le pseudo existe déjà dans la base
$pseudoexistant = Adherent::pseudoExiste($bdd,$pseudo);

//On commence l'ajout dans la base si le pseudo n'existe pas, donc le boolean a false
    if ($pseudoexistant == false) {
        $oAdherent = new Adherent();
        $tabObject = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'mdp' => $mdp,
            'mail' => $mail,
            'sexe' => $sexe,
            'role' => $role,
        );
        // on set l'objet
        foreach($tabObject as $key => $val)
        {
            $set = "set".ucfirst($key);
            $oAdherent->$set($val);
        }

        //On déclenche la méthode
        $oAdherent->inscrireUser($bdd,$oAdherent);

    } //fin du if (pseudo n'existe pas)
    //le pseudo existe déjà
    else{
        echo "Le pseudo " . $pseudo . " existe déjà..";
    }
} //fin du else (meme mot de passe)