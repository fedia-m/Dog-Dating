<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 07/12/17
 * Time: 16:02
 */
require '../connexion_bdd.php';

class Adherent{
    private $id;
    private $nom;
    private $prenom;
    private $pseudo;
    private $mdp;
    private $mail;
    private $adresse;
    private $codepostal;
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
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @return mixed
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    public function objetSetId($sid,$snom,$sprenom,$spseudo,$smdp,$smail,$sadresse,$scp,$ssexe,$savatar,$srole,$sidVille)
    {
        $this->id = $sid;
        $this->nom = $snom;
        $this->prenom = $sprenom;
        $this->login = $spseudo;
        $this->mdp = $smdp;
        $this->mail = $smail;
        $this->adresse = $sadresse;
        $this->codepostal = $scp;
        $this->sexe = $ssexe;
        $this->avatar = $savatar;
        $this->role = $srole;
        $this->idVille = $sidVille;
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
            $oAdherent->objetSetId($res['idAdherent'],$res['nomAdherent'],$res['prenomAdherent'],$res['pseudoAdherent'],$res['mdpAdherent'],$res['mailAdherent'],$res['adresseAdherent'],$res['cpAdherent'],$res['sexeAdherent'],$res['avatar'],$res['roleAdherent'],$res['id_Ville']);
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