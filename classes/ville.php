<?php 
require_once '../connexion_bdd.php';

class Ville
{
    private $id;    
    private $idDepartement;    
    private $nom;    
	private $cp;

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
    public function getIdDepartement()
    {
        return $this->idDepartement;
    }

    /**
     * @param mixed $idDepartement
     */
    public function setIdDepartement($idDepartement)
    {
        $this->idDepartement = $idDepartement;
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
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
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

    public function getNomParId($bdd,$idVille){
        $sql = $bdd->prepare('SELECT * FROM villes WHERE idVille = :idVille');
        $sql->execute(array('idVille' => $idVille));
        $oVille = new Ville();
        foreach ($sql as $row) {
                $oVille->setId($row['idVille']);
                $oVille->setIdDepartement($row['id_Departement']);
                $oVille->setNom($row['nomVille']);
                $oVille->setCp($row['cpVille']);
            }
            return $oVille;
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