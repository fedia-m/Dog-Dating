#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Chiens
#------------------------------------------------------------

CREATE TABLE Chiens(
        idChien            int (11) Auto_increment  NOT NULL ,
        nomChien           Varchar (32) NOT NULL ,
        sexeChien          Char (1) NOT NULL ,
        raceChien          Varchar (32) NOT NULL ,
        dateNaissanceChien Date NOT NULL ,
        loofChien          Varchar (25) ,
        lofChien           Int ,
        numeroPuce         Int ,
        photoChien         Varchar (25) ,
        idAdherent         Int NOT NULL ,
        idAnnonce          Int ,
        PRIMARY KEY (idChien )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Adherents
#------------------------------------------------------------

CREATE TABLE Adherents(
        idAdherent       int (11) Auto_increment  NOT NULL ,
        nomAdherent      Varchar (25) NOT NULL ,
        prenomAdherent   Varchar (25) NOT NULL ,
        pseudoAdherent   Varchar (25) ,
        passwordAdherent Varchar (25) NOT NULL ,
        mailAdherent     Varchar (25) NOT NULL ,
        adresseAdherent  Varchar (32) ,
        cpAdherent       Char (5) ,
        sexeAdherent     Char (1) ,
        idVille          Int ,
        PRIMARY KEY (idAdherent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Villes
#------------------------------------------------------------

CREATE TABLE Villes(
        idVille    int (11) Auto_increment  NOT NULL ,
        nomVille   Varchar (32) NOT NULL ,
        idAdherent Int NOT NULL ,
        idDepart   Int ,
        PRIMARY KEY (idVille )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Départements
#------------------------------------------------------------

CREATE TABLE Departements(
        idDepart  int (11) Auto_increment  NOT NULL ,
        nomDepart Varchar (32) ,
        idRegion  Int ,
        PRIMARY KEY (idDepart )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Regions
#------------------------------------------------------------

CREATE TABLE Regions(
        idRegion  int (11) Auto_increment  NOT NULL ,
        nomRegion Varchar (32) ,
        PRIMARY KEY (idRegion )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Annonces
#------------------------------------------------------------

CREATE TABLE Annonces(
        idAnnonce          int (11) Auto_increment  NOT NULL ,
        titreAnnonce       Varchar (32) ,
        descriptionAnnonce Longtext ,
        idAdherent         Int NOT NULL ,
        idChien            Int NOT NULL ,
        PRIMARY KEY (idAnnonce )
)ENGINE=InnoDB;

ALTER TABLE Chiens ADD CONSTRAINT FK_Chiens_idAdherent FOREIGN KEY (idAdherent) REFERENCES Adherents(idAdherent);
ALTER TABLE Chiens ADD CONSTRAINT FK_Chiens_idAnnonce FOREIGN KEY (idAnnonce) REFERENCES Annonces(idAnnonce);
ALTER TABLE Adherents ADD CONSTRAINT FK_Adherents_idVille FOREIGN KEY (idVille) REFERENCES Villes(idVille);
ALTER TABLE Villes ADD CONSTRAINT FK_Villes_idAdherent FOREIGN KEY (idAdherent) REFERENCES Adherents(idAdherent);
ALTER TABLE Villes ADD CONSTRAINT FK_Villes_idDepart FOREIGN KEY (idDepart) REFERENCES Departements(idDepart);
ALTER TABLE Departements ADD CONSTRAINT FK_Departements_idRegion FOREIGN KEY (idRegion) REFERENCES Regions(idRegion);
ALTER TABLE Annonces ADD CONSTRAINT FK_Annonces_idAdherent FOREIGN KEY (idAdherent) REFERENCES Adherents(idAdherent);
ALTER TABLE Annonces ADD CONSTRAINT FK_Annonces_idChien FOREIGN KEY (idChien) REFERENCES Chiens(idChien);
