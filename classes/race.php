<?php 
require_once '../connexion_bdd.php';

class Race
{
	private $id;	
	private $nom;

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
class Races
{
	private static $_instance = null;
    public $oCollRace;

    private function __construct($bdd){
        $this->oCollRace = array();
        $requete = "SELECT * FROM races ORDER BY nomRace ASC";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $tabObject = array('id' => $res['idRace'],
                'nom' => $res['nomRace'],
            );
            $oRace = new Race();
            $oRace->objetSet($tabObject);
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