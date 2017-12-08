#------------------------------------------------------------
#        Script MySQL.

DROP TABLE IF EXISTS Annonces;
DROP TABLE IF EXISTS Chiens;
DROP TABLE IF EXISTS Adherents;
DROP TABLE IF EXISTS Villes;
DROP TABLE IF EXISTS Departements;
DROP TABLE IF EXISTS Regions;

#------------------------------------------------------------
# Table: Regions
#------------------------------------------------------------

CREATE TABLE Regions(
  idRegion  INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  nomRegion VARCHAR (255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#------------------------------------------------------------
# Table: Départements
#------------------------------------------------------------

CREATE TABLE Departements(
  idDepartement  INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  nomDepartement VARCHAR (255) NOT NULL ,
  id_Region  INT(10) ,
  FOREIGN KEY (id_Region) REFERENCES Regions(idRegion) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#------------------------------------------------------------
# Table: Villes
#------------------------------------------------------------

CREATE TABLE Villes(
  idVille    INT(10)  AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  nomVille   VARCHAR (255) NOT NULL ,
  id_Departement INT(10) ,
  FOREIGN KEY (id_Departement) REFERENCES Departements(idDepartement) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


#------------------------------------------------------------
# Table: Adherents
#------------------------------------------------------------
CREATE TABLE Adherents(
  idAdherent       INT(10) AUTO_INCREMENT  NOT NULL ,
  nomAdherent      VARCHAR (255) NOT NULL ,
  prenomAdherent   VARCHAR (255) NOT NULL ,
  pseudoAdherent   VARCHAR (50) NOT NULL ,
  passwordAdherent VARCHAR (255) NOT NULL ,
  mailAdherent     VARCHAR (255) NOT NULL ,
  adresseAdherent  LONGTEXT ,
  cpAdherent       CHAR (5) ,
  sexeAdherent enum('H','F','A') DEFAULT NULL,
  avatar  VARCHAR(255),
  roleAdherent ENUM ('0','1') NOT NULL ,
  id_Ville INT(10),
  PRIMARY KEY (idAdherent),
  FOREIGN KEY (id_Ville) REFERENCES Villes(idVille) ON DELETE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



#------------------------------------------------------------
# Table: Chiens
#------------------------------------------------------------

CREATE TABLE Chiens(
  idChien            INT(10) AUTO_INCREMENT NOT NULL ,
  nomChien           VARCHAR (32) NOT NULL ,
  sexeChien          CHAR (1) NOT NULL ,
  raceChien          VARCHAR (32) NOT NULL ,
  dateNaissanceChien DATE NOT NULL ,
  loofChien          VARCHAR (25) ,
  lofChien           INT(10) ,
  numeroPuce         INT(10) ,
  photoChien         VARCHAR (255),
  id_Adherent INT(10),
  PRIMARY KEY (idChien),
  FOREIGN KEY (id_Adherent) REFERENCES Adherents(idAdherent) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Annonces
#------------------------------------------------------------

CREATE TABLE Annonces(
  idAnnonce          INT(10) AUTO_INCREMENT NOT NULL ,
  titreAnnonce       VARCHAR (32) ,
  descriptionAnnonce LONGTEXT,
  id_Chien INT(10),
  id_Adherent INT(10),
  PRIMARY KEY (idAnnonce, id_Chien,id_Adherent),
  FOREIGN KEY (id_Adherent) REFERENCES Adherents(idAdherent) ON DELETE CASCADE,
  FOREIGN KEY (id_Chien) REFERENCES Chiens(idChien) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;