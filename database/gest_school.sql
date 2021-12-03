-- //............... cursus ............//
CREATE TABLE `cursus` (
  id_cursus INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_cursus varchar(50) NOT NULL,
  frais_cursus INTEGER(50) NOT NULL
) ENGINE InnoDB;



-- //............... etudiant ............//
CREATE TABLE `etudiant` (
  id_etudiant INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  date_naissance INTEGER NOT NULL,
  cursus varchar(50) NOT NULL,
  id_cursus INTEGER NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;


  -- //............... professur ............//
CREATE TABLE `professeur` (
  id_professeur INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  matiere varchar(50) NOT NULL
  ) ENGINE InnoDB;


    -- //............... cursus-professeur ............//
CREATE TABLE `cursus_professeur` (
  id_cursus INTEGER NOT NULL,
  id_professeur INTEGER NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_professeur) REFERENCES professeur(id_professeur) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;



    -- //............... note ............//

CREATE TABLE `note` (
  id_note INTEGER PRIMARY KEY NOT NULL auto_increment,
  matiere varchar(50) NOT NULL,
  note INTEGER(50) NOT NULL,
  appreciation varchar(50) NOT NULL,
  id_etudiant INTEGER (50) NOT NULL,
  id_professeur INTEGER (50) NOT NULL,
  id_cursus INTEGER (50) NOT NULL,
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_professeur) REFERENCES professeur(id_professeur) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;



    -- //............... note ............//

CREATE TABLE `matiere` (
  id_matiere INTEGER PRIMARY KEY NOT NULL auto_increment,
  matiere varchar(50) NOT NULL,
  id_utilisateur INTEGER (50) NOT NULL,
  id_cursus INTEGER (50) NOT NULL,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;



  -- //............... compte-famille ............//
CREATE TABLE `utilisateur` (
  id_utilisateur INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  email varchar(200) NOT NULL,
  mot_de_passe varchar(200) NOT NULL,
  mobile integer(50) NOT NULL,
  adresse varchar(200) NOT NULL,
  code_postal integer(5) NOT NULL
) ENGINE InnoDB;


-- //............... compte_etudiant ............//
CREATE TABLE `role` (
  id_role INTEGER PRIMARY KEY NOT NULL auto_increment,
  role_label varchar(50) NOT NULL
) ENGINE InnoDB;



-- //............... compte_etudiant ............//
CREATE TABLE `utilisateur_role` (
  id_role INTEGER(50) NOT NULL,
  id_utilisateur INTEGER(50) NOT NULL,
  FOREIGN KEY (id_role) REFERENCES `role`(id_role) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;
 

