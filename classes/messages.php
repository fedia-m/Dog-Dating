<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 28/02/18
 * Time: 14:37
 */

class Message
{
    private $id;
    private $idExpediteur;
    private $idDestinataire;
    private $idChien;
    private $objet;
    private $contenu;

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
    public function getIdExpediteur()
    {
        return $this->idExpediteur;
    }

    /**
     * @param mixed $idExpediteur
     */
    public function setIdExpediteur($idExpediteur)
    {
        $this->idExpediteur = $idExpediteur;
    }

    /**
     * @return mixed
     */
    public function getIdDestinataire()
    {
        return $this->idDestinataire;
    }

    /**
     * @param mixed $idDestinataire
     */
    public function setIdDestinataire($idDestinataire)
    {
        $this->idDestinataire = $idDestinataire;
    }

    /**
     * @return mixed
     */
    public function getIdChien()
    {
        return $this->idChien;
    }

    /**
     * @param mixed $idChien
     */
    public function setIdChien($idChien)
    {
        $this->idChien = $idChien;
    }

    /**
     * @return mixed
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * @param mixed $objet
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
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

class Messages{

    private static $_instance = null;
    public $oCollMessage;

    private function __construct($bdd){
        $this->oCollMessage = array();
        $requete = "SELECT * FROM messages";
        $sql = $bdd->query($requete);

        while($res=$sql->fetch(PDO::FETCH_ASSOC))
        {

            $oMessage = new Message();
            $oMessage->objetSetId($res['idMessage'],$res['idExpediteur'],$res['idDestinataire'],$res['idChien'],$res['objet'],$res['contenu']);
            $this->oCollMessage[] = $oMessage;
        }

    }

    public static function getInstance($bdd)
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new Messages($bdd);
        }

        return self::$_instance;
    }

    public function getCollection()
    {
        return $this->oCollMessage;
    }
}