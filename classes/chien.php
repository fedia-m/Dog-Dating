<?php 
//require_once '../connexion_bdd.php';

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
}

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
            $oChien->objetSetId($res['idChien'],$res['nomChien'],$res['sexeChien'],$res['dateNaissanceChien'],$res['lofChien'],$res['numeroPuce'],$res['photoChien'],$res['descriptionChien'],$res['id_Adherent'],$res['id_Race']);
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