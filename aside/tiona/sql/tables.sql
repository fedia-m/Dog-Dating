#------------------------------------------------------------
#        Script MySQL.

DROP TABLE IF EXISTS annonces;
DROP TABLE IF EXISTS races;
DROP TABLE IF EXISTS chiens;
DROP TABLE IF EXISTS adherents;
DROP TABLE IF EXISTS villes;
DROP TABLE IF EXISTS departements;
DROP TABLE IF EXISTS regions;

#------------------------------------------------------------
# Table: regions
#------------------------------------------------------------

CREATE TABLE regions(
  idRegion  INT(10) PRIMARY KEY NOT NULL ,
  codeRegion VARCHAR(6) NOT NULL ,
  nomRegion VARCHAR (255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#------------------------------------------------------------
# Table: Départements
#------------------------------------------------------------

CREATE TABLE departements(
  idDepartement  VARCHAR(10) PRIMARY KEY NOT NULL ,
  nomDepartement VARCHAR (255) NOT NULL ,
  id_Region  INT(10) ,
  FOREIGN KEY (id_Region) REFERENCES regions(idRegion) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#------------------------------------------------------------
# Table: villes
#------------------------------------------------------------

CREATE TABLE villes(
  idVille    INT(10) PRIMARY KEY NOT NULL ,
  id_Departement VARCHAR(10) ,
  nomVille   VARCHAR (255) NOT NULL ,
  cpVille VARCHAR(10),
  FOREIGN KEY (id_Departement) REFERENCES departements(idDepartement) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: adherents
#------------------------------------------------------------
CREATE TABLE adherents(
  idAdherent       INT(10) AUTO_INCREMENT  NOT NULL ,
  nomAdherent      VARCHAR (255) NOT NULL ,
  prenomAdherent   VARCHAR (255) NOT NULL ,
  pseudoAdherent   VARCHAR (50) NOT NULL ,
  mdpAdherent VARCHAR (255) NOT NULL ,
  mailAdherent     VARCHAR (255) NOT NULL ,
  adresseAdherent  LONGTEXT ,
  cpAdherent       CHAR (5) ,
  sexeAdherent enum('H','F','A') DEFAULT NULL,
  avatar  VARCHAR(255),
  roleAdherent ENUM ('0','1') NOT NULL ,
  id_Ville INT(10),
  PRIMARY KEY (idAdherent),
  FOREIGN KEY (id_Ville) REFERENCES villes(idVille) ON DELETE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


#------------------------------------------------------------
# Table: races
#------------------------------------------------------------
CREATE TABLE races(
  idRace INT(10) AUTO_INCREMENT NOT NULL ,
  nomRace VARCHAR(50) NOT NULL,
  PRIMARY KEY (idRace)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


#------------------------------------------------------------
# Table: chiens
#------------------------------------------------------------

CREATE TABLE chiens(
  idChien            INT(10) AUTO_INCREMENT NOT NULL ,
  nomChien           VARCHAR (32) NOT NULL ,
  sexeChien          CHAR (1) NOT NULL ,
  dateNaissanceChien DATE NOT NULL ,
  loofChien          VARCHAR (25) ,
  lofChien           VARCHAR (25) ,
  numeroPuce         VARCHAR (25) ,
  photoChien         VARCHAR (255),
  id_Adherent INT(10),
  id_Race INT(10),
  PRIMARY KEY (idChien),
  FOREIGN KEY (id_Race) REFERENCES races(idRace) ON DELETE CASCADE,
  FOREIGN KEY (id_Adherent) REFERENCES adherents(idAdherent) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#------------------------------------------------------------
# Table: annonces
#------------------------------------------------------------

CREATE TABLE annonces(
  idAnnonce          INT(10) AUTO_INCREMENT NOT NULL ,
  titreAnnonce       VARCHAR (32) ,
  descriptionAnnonce LONGTEXT,
  id_Chien INT(10),
  id_Adherent INT(10),
  PRIMARY KEY (idAnnonce, id_Chien,id_Adherent),
  FOREIGN KEY (id_Adherent) REFERENCES adherents(idAdherent) ON DELETE CASCADE,
  FOREIGN KEY (id_Chien) REFERENCES chiens(idChien) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


