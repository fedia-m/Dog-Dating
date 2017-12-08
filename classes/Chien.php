<?php 


class Chien
{
	private $id;	
	private $nom;
	private $sexe;
	private $naissance;
	private $loof;
	private $lof;
	private $numeroPuce;
	private $photo;
	private $idAdherent;
	private $idRace;

	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getSexe()
	{
		return $this->sexe;
	}

	public function getNaissance()
	{
		return $this->naissance;
	}

	public function getLoof()
	{
		return $this->loof;
	}

	public function getLof()
	{
		return $this->lof;
	}

	public function getNumeroPuce()
	{
		return $this->numeroPuce;
	}

	public function getPhoto()
	{
		return $this->photo;
	}

	public function getIdAdherent()
	{
		return $this->idAdherent;
	}

	public function getIdRace()
	{
		return $this->idRace;
	}



	public function objetSetId($sid,$snom,$ssexe,$snaissance,$sloof,$slof,$snumeroPuce,$sphoto,$sidAdherent,$sidRace);
    {
        $this->id = $sid;
        $this->nom = $snom;
        $this->naissance = $naissance;
        $this->loof = $loof;
        $this->lof= $lof;
        $this->loof = $sloof;
        $this->numeroPuce = $snumeroPuce;
        $this->photo = $sphoto;
        $this->idAdherent = $sidAdherent;
        $this->idRace = $sidRace;
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
            $oChien->objetSetId($res['idChien'],$res['nomChien'],$res['sexeChien'],$res['dateNaissanceChien'],$res['loofChien'],$res['lofChien'],$res['numeroPuce'],$res['photoChien'],$res['id_Adherent'],$res['id_Race']);
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