-- //............... cursus ............//
CREATE TABLE `cursus` (
  id_cursus INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_cursus varchar(50) NOT NULL,
  frais_cursus INTEGER(50) NOT NULL
) ENGINE InnoDB;



-- //............... etudiant ............//
CREATE TABLE `etudiant` (
  id_etudiant INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_etudiant varchar(50) NOT NULL,
  prenom_etudiant varchar(50) NOT NULL,
  date_naissance_etudiant INTEGER NOT NULL,
  cursus_etudiant varchar(50) NOT NULL,
  id_cursus INTEGER NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;


  -- //............... professur ............//
CREATE TABLE `professeur` (
  id_professeur INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_professeur varchar(50) NOT NULL,
  prenom_professeur varchar(50) NOT NULL,
  nom_matiere varchar(50) NOT NULL
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
  note INTEGER(50) NOT NULL,
  appreciation varchar(50) NOT NULL,
  nom_matiere varchar(50) NOT NULL,
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


  -- //............... compte-famille ............//
CREATE TABLE `compte_famille` (
  id_compte_famille INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_responsable_legal varchar(50) NOT NULL,
  prenom_responsable_legal varchar(50) NOT NULL,
  email varchar(200) NOT NULL,
  mot_de_passe varchar(200) NOT NULL,
  mobile integer(50) NOT NULL,
  adresse varchar(200) NOT NULL,
  code_postal integer(5) NOT NULL,
  nom_1ere_enfant varchar(50) NOT NULL,
  prenom_1ere_enfant varchar(50) NOT NULL,
  date_naissance_1e DATE,
  nom_2eme_enfant varchar(50),
  prenom_2eme_enfant varchar(50),
  date_naissance_2e DATE,
  nom_3eme_enfant varchar(50),
  prenom_3eme_enfant varchar(50),
  date_naissance_3e DATE,
  nom_4eme_enfant varchar(50),
  prenom_4eme_enfant varchar(50),
  date_naissance_4e DATE,
  id_cursus INTEGER (50) NOT NULL,
  id_etudiant INTEGER (50) NOT NULL,
  id_note INTEGER (50) NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_note) REFERENCES note(id_note) 
  ON DELETE CASCADE
) ENGINE InnoDB;


-- //............... compte_etudiant ............//
CREATE TABLE `compte_etudiant` (
  id_compte_etudiant INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_etudiant varchar(50) NOT NULL,
  prenom_etudiant varchar(50) NOT NULL,
  date_naissance_etudiant DATE,
  email varchar(200) NOT NULL,
  mot_de_passe varchar(200) NOT NULL,
  id_cursus INTEGER (50) NOT NULL,
  id_etudiant INTEGER (50) NOT NULL,
  id_note INTEGER (50) NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_note) REFERENCES note(id_note) 
  ON DELETE CASCADE
) ENGINE InnoDB;
 


  -- //............... compte_professeur ............//
CREATE TABLE `compte_professeur` (
  id_compte_professeur INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_professeur varchar(50) NOT NULL,
  prenom_professeur varchar(50) NOT NULL,
  email varchar(200) NOT NULL,
  mot_de_passe varchar(200) NOT NULL,
  mobile integer(50) NOT NULL,
  adresse varchar(200) NOT NULL,
  code_postal integer(5) NOT NULL,
  id_cursus INTEGER (50) NOT NULL,
  id_note INTEGER (50) NOT NULL,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_note) REFERENCES note(id_note) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;



    -- //............... compte_admin ............//
CREATE TABLE `compte_admin` (
  id_compte_admin INTEGER PRIMARY KEY NOT NULL auto_increment,
  nom_admin varchar(50) NOT NULL,
  prenom_admin varchar(50) NOT NULL,
  email varchar(200) NOT NULL,
  mot_de_passe varchar(200) NOT NULL,
  mobile integer(50) NOT NULL,
  adresse varchar(200) NOT NULL,
  code_postal integer(5) NOT NULL,
  id_compte_famille INTEGER (50) NOT NULL,
  id_compte_etudiant INTEGER (50) NOT NULL,
  id_compte_professeur INTEGER (50) NOT NULL,
  id_cursus INTEGER (50) NOT NULL,
  FOREIGN KEY (id_compte_famille) REFERENCES compte_famille(id_compte_famille) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_compte_etudiant) REFERENCES compte_etudiant(id_compte_etudiant) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_compte_professeur) REFERENCES compte_professeur(id_compte_professeur) 
  ON DELETE CASCADE,
  FOREIGN KEY (id_cursus) REFERENCES cursus(id_cursus) 
  ON DELETE CASCADE
  ) ENGINE InnoDB;