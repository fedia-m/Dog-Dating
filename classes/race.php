<?php 
require_once 'connexion_bdd.php';

class Race
{
	private $id;	
	private $nom;

	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function objetSetId($sid,$snom)
    {
        $this->id = $sid;
        $this->nom = $snom;
    }

}


/**
* 
*/
class Races
{
	private static $_instance = null;
    public $oCollRace;

    private function __construct($bdd){
        $this->oCollRace = array();
        $requete = "SELECT * FROM races";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {

            $oRace = new Race();
            $oRace->objetSetId($res['idRace'],$res['nomRace']);
            $this->oCollRace[] = $oRace;
        }


    }

    public static function getInstance($bdd)
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new Races($bdd);
        }

        return self::$_instance;
    }

    public function getCollection()
    {
        return $this->oCollRace;
    }
	
}

?>