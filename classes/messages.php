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
    private $archiveExp;
    private $archiveDest;

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
     * @return mixed
     */
    public function getArchiveExp()
    {
        return $this->archiveExp;
    }

    /**
     * @param mixed $archiveDest
     */
    public function setArchiveDest($archiveDest)
    {
        $this->archiveDest = $archiveDest;
    }

    /**
     * @return mixed
     */
    public function getArchiveDest()
    {
        return $this->archiveDest;
    }

    /**
     * @param mixed $archiveExp
     */
    public function setArchiveExp($archiveExp)
    {
        $this->archiveExp = $archiveExp;
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

    public function deleteMessage($bdd,$oMessage){
        $idMessage = $oMessage->getId();
        $sql = $bdd->prepare("DELETE FROM messages WHERE idMessage = :idMessage");
        $sql->bindParam(':idMessage', $idMessage);
        $sql->execute();
        header('location:' . BASE_URL . 'views/mes_messages.php');
    }

    public function envoyerMessage($bdd,$oMessage){
            $idExp = $oMessage->getIdExpediteur();
            $idDest = $oMessage->getIdDestinataire();
            $idChien = $oMessage->getIdChien();
            $objetMessage = $oMessage->getObjet();
            $contenuMessage = $oMessage->getContenu();
            $archiveExp = $oMessage->getArchiveExp();
            $archiveDest = $oMessage->getArchiveDest();
            //DEBUT INSERTION SQL
            $sql = $bdd->prepare("INSERT INTO messages (idExpediteur, idDestinataire, idChien, objetMessage, contenuMessage, archiveExp, archiveDest) VALUES (:idExpediteur, :idDestinataire, :idChien, :objetMessage, :contenuMessage, :archiveExp, :archiveDest)");
            $sql->bindParam(':idExpediteur', $idExp);
            $sql->bindParam(':idDestinataire', $idDest);
            $sql->bindParam(':idChien', $idChien);
            $sql->bindParam(':objetMessage', $objetMessage);
            $sql->bindParam(':contenuMessage', $contenuMessage);
            $sql->bindParam(':archiveExp', $archiveExp);
            $sql->bindParam(':archiveDest', $archiveDest);
            $sql->execute();
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
            $oMessage->objetSetId($res['idMessage'],$res['id_Expediteur'],$res['id_Destinataire'],$res['id_Chien'],$res['objet'],$res['contenu'],$res['archiveExp'],$res['archiveDest']);
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