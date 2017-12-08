<?php 


class Annonce
{
	private $id;	
	private $titre;
	private $description;
	private $idChien;
	private $idAdherent;

	public function getId()
	{
		return $this->id;
	}

	public function getTitre()
	{
		return $this->titre;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getIdChien()
	{
		return $this->idChien;
	}

	public function getIdAdherent()
	{
		return $this->idAdherent;
	}


	public function objetSetId($sid,$stitre,$sdescription,$sidchien,$sidadherent);
    {
        $this->id = $sid;
        $this->titre = $stitre;
        $this->description = $sdescription;
        $this->idChien = $sidchien;
        $this->idAdherent= $sidadherent;
    }

}


/**
* 
*/
class Annonces
{
	private static $_instance = null;
    public $oCollAnnonce;

    private function __construct($bdd){
        $this->oCollAnnonce = array();
        $requete = "SELECT * FROM annonces";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {

            $oAnnonce = new Annonce();
            $oAnnonce->objetSetId($res['idAnnonce'],$res['titreAnnonce'],$res['descriptionAnnonce'],$res['id_Chien'],$res['id_Adherent']);
            $this->oCollAnnonce[] = $oAnnonce;
        }


    }

    public static function getInstance($bdd)
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new Annonces($bdd);
        }

        return self::$_instance;
    }

    public function getCollection()
    {
        return $this->oCollAnnonce;
    }
	
}

?>