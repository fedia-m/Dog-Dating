<?php 


class Adherent
{
    private $id;
    private $nom;
    private $prenom;
    private $pseudo;
    private $mdp;
    private $mail;
    private $adresse;
    private $sexe;
    private $avatar;
    private $role;
    private $idVille;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * @param mixed $idVille
     */
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    }

    /**
    Fonction permettant de setter
    *@tabObject Array Tableau 
    */
    public function objetSet($tabObject)
    {
        foreach($tabObject as $key => $val)
        {
            $set = "set".ucfirst($key);
            $this->$set($val);
        }
    }

    public static function pseudoExiste($bdd,$pseudo){
        //on initilise à false
        $pseudoexistant = false;
        $sql = $bdd->prepare('SELECT * FROM adherents WHERE pseudoAdherent = :pseudo');

        $sql->execute(array('pseudo' => $pseudo));
        //parcours de la base
        foreach ($sql as $row) {
            //si il y a un enregistrement en base avec le même pseudo, on le met a true
            $pseudoexistant = true;
        }
        return $pseudoexistant;
    }

    public function connect($bdd,$oAdherent)
    {
        $pseudo = $oAdherent->getPseudo();
        $mdp = $oAdherent->getMdp();
        $sql = $bdd->prepare('SELECT * FROM adherents WHERE pseudoAdherent = :pseudo and mdpAdherent = :mdp');
        $sql->execute(array('pseudo' => $pseudo, 'mdp' => $mdp));
        //L'utilisateur est reconnu
        foreach ($sql as $row) {
            $idAdherent = $row['idAdherent'];
            $repertoire = "../images/" . $idAdherent;
            var_dump($repertoire);
            //Si le dossier attribué à l'utilisateur n'existe pas on le crée
            if (!is_dir("$repertoire")) {
                //echo "Félicitation, votre dossier a été crée ! Bienvenu chez DOG DATING ☻";
                //echo $repertoire;
                mkdir($repertoire, 0777, true); //crée le dossier avatars pour y ranger les photos de profil
                mkdir($repertoire . "/avatars", 0755, true); //crée le dossier dogs où irons les photos de son chien
                mkdir($repertoire . "/dogs", 0755, true); //crée le dossier dogs où irons les photos de son chien
            }
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
            header('Location: ' . BASE_URL);
            //var_dump($_SESSION['utilisateur']);
        }
    }

    //Méthode qui permet l'ajout d'une personne
    public function inscrireUser($bdd,$oAdherent){
        $nom = $oAdherent->getNom();
        $prenom = $oAdherent->getPrenom();
        $pseudo = $oAdherent->getPseudo();
        $mdp = $oAdherent->getMdp();
        $mail = $oAdherent->getMail();
        $sexe = $oAdherent->getSexe();
        $role = $oAdherent->getRole();
        //DEBUT INSERTION SQL
        $sql = $bdd->prepare("INSERT INTO adherents (nomAdherent,prenomAdherent,pseudoAdherent,mdpAdherent,mailAdherent,sexeAdherent,roleAdherent) VALUES (:nom, :prenom, :pseudo, :mdp, :mail, :sexe, :role)");
        // :XXX où XXX est l'attribut de la classe en question
        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':prenom', $prenom);
        $sql->bindParam(':pseudo', $pseudo);
        $sql->bindParam(':mdp', $mdp);
        $sql->bindParam(':mail', $mail);
        $sql->bindParam(':sexe', $sexe);
        $sql->bindParam(':role', $role);
        $sql->execute();
        header('location:'.BASE_URL.'views/bienvenue.php');
    }

    //méthode pour modifier une personne
    public function editUser($bdd,$oAdherent){
        $nom = $oAdherent->getNom();
        $prenom = $oAdherent->getPrenom();
        $pseudo = $oAdherent->getPseudo();
        $mdp = $oAdherent->getMdp();
        $mail = $oAdherent->getMail();
        $sexe = $oAdherent->getSexe();
        $role = $oAdherent->getRole();

        $sql = $bdd->prepare("INSERT INTO adherents (nomAdherent,prenomAdherent,pseudoAdherent,mdpAdherent,mailAdherent,sexeAdherent,roleAdherent) VALUES (:nom, :prenom, :pseudo, :mdp, :mail, :sexe, :role)");
        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':prenom', $prenom);
        $sql->bindParam(':pseudo', $pseudo);
        $sql->bindParam(':mdp', $mdp);
        $sql->bindParam(':mail', $mail);
        $sql->bindParam(':sexe', $sexe);
        $sql->bindParam(':role', $role);
        $sql->execute();

    }
}

class Adherents{

    private static $_instance = null;
    public $oCollAdherent;

    private function __construct($bdd){
        $this->oCollAdherent = array();
        $requete = "SELECT * FROM adherents";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {

            $oAdherent = new Adherent();
            $oAdherent->objetSetId($res['idAdherent'],$res['nomAdherent'],$res['prenomAdherent'],$res['pseudoAdherent'],$res['mdpAdherent'],$res['mailAdherent'],$res['adresseAdherent'],$res['sexeAdherent'],$res['avatarAdherent'],$res['roleAdherent'],$res['id_Ville']);
            $this->oCollAdherent[] = $oAdherent;
        }


    }

    public static function getInstance($bdd)
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new Adherents($bdd);
        }

        return self::$_instance;
    }

    public function getCollection()
    {
        return $this->oCollAdherent;
    }
}