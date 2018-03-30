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
    private $id_Expediteur;
    private $id_Destinataire;
    private $id_Chien;
    private $objetMessage;
    private $contenuMessage;
    private $messageArchiveE;
    private $messageArchiveD;

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
    public function getId_Expediteur()
    {
        return $this->id_Expediteur;
    }

    /**
     * @param mixed $id_Expediteur
     */
    public function setId_Expediteur($id_Expediteur)
    {
        $this->id_Expediteur = $id_Expediteur;
    }

    /**
     * @return mixed
     */
    public function getId_Destinataire()
    {
        return $this->id_Destinataire;
    }

    /**
     * @param mixed $id_Destinataire
     */
    public function setId_Destinataire($id_Destinataire)
    {
        $this->id_Destinataire = $id_Destinataire;
    }

    /**
     * @return mixed
     */
    public function getId_Chien()
    {
        return $this->id_Chien;
    }

    /**
     * @param mixed $id_Chien
     */
    public function setId_Chien($id_Chien)
    {
        $this->id_Chien = $id_Chien;
    }

    /**
     * @return mixed
     */
    public function getObjetMessage()
    {
        return $this->objetMessage;
    }

    /**
     * @param mixed $objetMessage
     */
    public function setObjetMessage($objetMessage)
    {
        $this->objetMessage = $objetMessage;
    }

    /**
     * @return mixed
     */
    public function getContenuMessage()
    {
        return $this->contenuMessage;
    }

    /**
     * @param mixed $contenuMessage
     */
    public function setContenuMessage($contenuMessage)
    {
        $this->contenuMessage = $contenuMessage;
    }

    /**
     * @return mixed
     */
    public function getMessageArchiveE()
    {
        return $this->messageArchiveE;
    }

    /**
     * @param mixed $messageArchiveE
     */
    public function setMessageArchiveE($messageArchiveE)
    {
        $this->messageArchiveE = $messageArchiveE;
    }

    /**
     * @return mixed
     */
    public function getMessageArchiveD()
    {
        return $this->messageArchiveD;
    }

    /**
     * @param mixed $messageArchiveD
     */
    public function setMessageArchiveD($messageArchiveD)
    {
        $this->messageArchiveD = $messageArchiveD;
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
            $id_Expediteur = $oMessage->getId_Expediteur();
            $id_Destinataire = $oMessage->getId_Destinataire();
            $id_Chien = $oMessage->getId_Chien();
            $objetMessage = $oMessage->getObjetMessage();
            $contenuMessage = $oMessage->getContenuMessage();
            $messageArchiveE = $oMessage->getMessageArchiveE();
            $messageArchiveD = $oMessage->getMessageArchiveD();
            //DEBUT INSERTION SQL
            $sql = $bdd->prepare("INSERT INTO messages (id_Expediteur, id_Destinataire, id_Chien, objetMessage, contenuMessage, messageArchiveE, messageArchiveD) VALUES (:id_Expediteur, :id_Destinataire, :id_Chien, :objetMessage, :contenuMessage, :messageArchiveE, :messageArchiveD)");
            $sql->bindParam(':id_Expediteur', $id_Expediteur);
            $sql->bindParam(':id_Destinataire', $id_Destinataire);
            $sql->bindParam(':id_Chien', $id_Chien);
            $sql->bindParam(':objetMessage', $objetMessage);
            $sql->bindParam(':contenuMessage', $contenuMessage);
            $sql->bindParam(':messageArchiveE', $messageArchiveE);
            $sql->bindParam(':messageArchiveD', $messageArchiveD);
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
            $oMessage->objetSetId($res['idMessage'],$res['id_Expediteur'],$res['id_Destinataire'],$res['id_Chien'],$res['objet'],$res['contenu'],$res['messageArchiveE'],$res['messageArchiveD  ']);
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