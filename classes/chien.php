<?php 
require_once '../connexion_bdd.php';

class Chien
{
	private $id;
	private $nom;
	private $sexe;
	private $naissance;
	private $lof;
	private $numeroPuce;
	private $photo;
	private $description;
	private $idAdherent;
	private $idRace;

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
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * @param mixed $naissance
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;
    }

    /**
     * @return mixed
     */
    public function getLof()
    {
        return $this->lof;
    }

    /**
     * @param mixed $lof
     */
    public function setLof($lof)
    {
        $this->lof = $lof;
    }

    /**
     * @return mixed
     */
    public function getNumeroPuce()
    {
        return $this->numeroPuce;
    }

    /**
     * @param mixed $numeroPuce
     */
    public function setNumeroPuce($numeroPuce)
    {
        $this->numeroPuce = $numeroPuce;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIdAdherent()
    {
        return $this->idAdherent;
    }

    /**
     * @param mixed $idAdherent
     */
    public function setIdAdherent($idAdherent)
    {
        $this->idAdherent = $idAdherent;
    }

    /**
     * @return mixed
     */
    public function getIdRace()
    {
        return $this->idRace;
    }

    /**
     * @param mixed $idRace
     */
    public function setIdRace($idRace)
    {
        $this->idRace = $idRace;
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

    public function getNomAdherentParId($bdd,$idAdherent){
        $sql = $bdd->prepare('SELECT nomAdherent, prenomAdherent FROM adherents WHERE idAdherent = :idAdherent');
        return $sql->execute(array(':idAdherent' => $idAdherent));
    }
    public function getListeChienParId($bdd,$idUtilisateur)
    {
        $sql = $bdd->prepare('SELECT * FROM chiens ch LEFT JOIN adherents adh ON adh.idAdherent = ch.id_Adherent WHERE idAdherent = :idUser');
        $sql->execute(array(':idUser' => $idUtilisateur));

        foreach ($sql as $row) {
            $oChien = new Chien();
            $oChien->setId($row['idChien']);
            $oChien->setNom($row['nomChien']);
            $oChien->setSexe($row['sexeChien']);
            $oChien->setNaissance($row['dateNaissanceChien']);
            $oChien->setLof($row['lofChien']);
            $oChien->setNumeroPuce($row['numeroPuce']);
            $oChien->setPhoto($row['photoChien']);
            $oChien->setDescription($row['descriptionChien']);
            $oChien->setIdAdherent($row['id_Adherent']);
            $oChien->setIdRace($row['id_Race']);
            $this->oCollChien[] = $oChien;
        }
    }

    //Méthode qui permet l'ajout du chien
    public function addDog($bdd,$oChien){
        $nom = $oChien->getNom();
        $sexe = $oChien->getSexe();
        $naissance = $oChien->getNaissance();
        $lof = $oChien->getLof();
        $numeroPuce = $oChien->getNumeroPuce();
        $photo = $oChien->getPhoto();
        $description = $oChien->getDescription();
        $idAdherent = $oChien->getIdAdherent();
        $idRace = $oChien->getIdRace();
        //DEBUT INSERTION SQL
        $sql = $bdd->prepare("INSERT INTO chiens (nomChien,sexeChien,dateNaissanceChien,lofChien,numeroPuce,photoChien,descriptionChien,id_Adherent,id_Race) VALUES (:nom, :sexe, :naissance, :lof, :numeroPuce, :photo, :description, :idAdherent, :idRace)");
        // :XXX où XXX est l'attribut de la classe en question
        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':sexe', $sexe);
        $sql->bindParam(':naissance', $naissance);
        $sql->bindParam(':lof', $lof);
        $sql->bindParam(':numeroPuce', $numeroPuce);
        $sql->bindParam(':photo', $photo);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':idAdherent', $idAdherent);
        $sql->bindParam(':idRace', $idRace);
        $sql->execute();
        header('location:' . BASE_URL . 'views/page_profil.php');
    }



} //Fin de la classe chien

/**
* 
*/
class Chiens
{
	private static $_instance = null;
    public $oCollChien;

    private function __construct($bdd){
        $this->oCollChien = array();
        $requete = "SELECT * FROM chiens";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {

            $oChien = new Chien();
            $oChien->setId($res['idChien']);
            $oChien->setNom($res['nomChien']);
            $oChien->setSexe($res['sexeChien']);
            $oChien->setNaissance($res['dateNaissanceChien']);
            $oChien->setLof($res['lofChien']);
            $oChien->setPhoto($res['photoChien']);
            $oChien->setNumeroPuce($res['numeroPuce']);
            $oChien->setDescription($res['descriptionChien']);
            $oChien->setIdAdherent($res['id_Adherent']);
            $oChien->setIdRace($res['id_Race']);
            $this->oCollChien[] = $oChien;
        }


    }

    public static function getInstance($bdd)
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new Chiens($bdd);
        }

        return self::$_instance;
    }

    public function getCollection()
    {
        return $this->oCollChien;
    }
	
}

?>