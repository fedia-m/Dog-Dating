<?php 
require_once 'connexion_bdd.php';

class Ville
{
    private $id;    
    private $idDepartement;    
    private $nom;    
	private $cp;

	public function getId()
	{
		return $this->id;
	}

	public function getIdDepartement()
    {
        return $this->idDepartement;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getCp()
    {
        return $this->cp;
    }

	public function objetSetId($sid,$siddepartement,$snom,$scp)
    {
        $this->id = $sid;
        $this->idDepartement = $siddepartement;
        $this->nom = $snom;
        $this->cp = $scp;

    }

}


/**
* 
*/
class Villes
{
	private static $_instance = null;
    public $oCollVille;

    private function __construct($bdd){
        $this->oCollVille = array();
        $requete = "SELECT * FROM villes";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {

            $oVille = new Ville();
            $oVille->objetSetId($res['idVille'],$res['id_Departement'],$res['nomVille'],$res['cpVille']);
            $this->oCollVille[] = $oVille;
        }


    }

    public static function getInstance($bdd)
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new Villes($bdd);
        }

        return self::$_instance;
    }

    public function getCollection()
    {
        return $this->oCollVille;
    }
	
}

?>