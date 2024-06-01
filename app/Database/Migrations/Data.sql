create table admin
(
    id_admin serial primary key not null,
    nom VARCHAR(255),
    login VARCHAR(50),
    passe VARCHAR(255)
);

CREATE TABLE equipe(
   id_equipe serial primary key not null,
   nom VARCHAR(255) ,
   login VARCHAR(50) ,
   passe VARCHAR(255)
);

CREATE TABLE Categorie(
   id_categorie serial primary key not null,
   nom VARCHAR(255)
);

-- Insérer des catégories dans la table Categorie
INSERT INTO Categorie (nom) VALUES ('Homme');
INSERT INTO Categorie (nom) VALUES ('Femme');
INSERT INTO Categorie (nom) VALUES ('Junior');
INSERT INTO Categorie (nom) VALUES ('Senior');
-- Ajoutez d'autres catégories si nécessaire


CREATE TABLE Course(
   id_course serial primary key not null,
   nom_course VARCHAR(255)
);

INSERT INTO Course (nom_course) VALUES ('Course 1');
INSERT INTO Course (nom_course) VALUES ('Course 2');
INSERT INTO Course (nom_course) VALUES ('Course 3');


CREATE TABLE Etape(
   id_etape serial not null,
   nom VARCHAR(225) ,
   longueur_km NUMERIC(10,2)  ,
   nb_coureur INTEGER,
   rang_etape INTEGER,
   id_course INTEGER NOT NULL,
   PRIMARY KEY(id_etape),
   FOREIGN KEY(id_course) REFERENCES Course(id_course)
);

INSERT INTO Etape (nom, longueur_km, nb_coureur, rang_etape, id_course) VALUES ('Betsizaraina', 150.5, 2, 1, 1);
INSERT INTO Etape (nom, longueur_km, nb_coureur, rang_etape, id_course) VALUES ('Mandrosoa', 120.25, 3, 2, 1);
INSERT INTO Etape (nom, longueur_km, nb_coureur, rang_etape, id_course) VALUES ('Andapa', 120.25, 3, 3, 1);

CREATE TABLE Coureur (
    id_coureur SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    numero_dossard INTEGER NOT NULL,
    genre VARCHAR(10) NOT NULL,
    date_naissance DATE NOT NULL,
    id_equipe INTEGER NOT NULL,
    FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe)
);

-- Insertions d'exemples de coureurs
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Rakoto', 101, 'Homme', '1990-05-15', 1);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Randria', 102, 'Femme', '1992-08-20', 1);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Michael', 103, 'Homme', '1988-03-10', 1);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Emily Johnson', 104, 'Femme', '1995-11-28', 1);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('David Brown', 105, 'Homme', '1993-09-17', 1);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Sarah Williams', 106, 'Femme', '1991-07-05',1);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Daniel Lee', 107, 'Homme', '1987-12-22', 2);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Jessica Taylor', 108, 'Femme', '1989-06-12', 2);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Ryan Martinez', 109, 'Homme', '1994-04-03', 2);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Amanda White', 110, 'Femme', '1996-01-19', 2);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Michael Dieu', 111, 'Homme', '1990-08-15', 2);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Jennifer Rodriguez', 112, 'Femme', '1992-03-25', 2);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Christopher Anderson', 113, 'Homme', '1988-05-10',3);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Emma Garcia', 114, 'Femme', '1997-10-08',3);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Nicholas Martinez', 115, 'Homme', '1996-12-01',3);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Olivia Miller', 116, 'Femme', '1993-02-14',3);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('William Taylor', 117, 'Homme', '1991-06-30',3);
INSERT INTO Coureur (nom, numero_dossard, genre, date_naissance, id_equipe) VALUES ('Sophia Anderson', 118, 'Femme', '1994-09-23',3);



CREATE TABLE CoureurCategorie (
    id_coureurcategorie serial primary key not null,
    id_coureur INTEGER NOT NULL,
    id_categorie INTEGER NOT NULL,
    FOREIGN KEY (id_coureur) REFERENCES Coureur(id_coureur),
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id_categorie)
);


-- Coureur 101 (Rakoto) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (1, 1);

-- Coureur 102 (Randria) est une Femme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (2, 2);

-- Coureur 103 (Michael) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (3, 1);

-- Coureur 104 (Emily Johnson) est une Femme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (4, 2);

-- Coureur 105 (David Brown) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (5, 1);

-- Coureur 106 (Sarah Williams) est une Femme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (6, 2);

-- Coureur 107 (Daniel Lee) est un Homme et un Senior
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (7, 1);
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (7, 4);

-- Coureur 108 (Jessica Taylor) est une Femme et une Junior
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (8, 2);
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (8, 3);

-- Coureur 109 (Ryan Martinez) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (9, 1);

-- Coureur 110 (Amanda White) est une Femme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (10, 2);

-- Coureur 111 (Michael Dieu) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (11, 1);

-- Coureur 112 (Jennifer Rodriguez) est une Femme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (12, 2);

-- Coureur 113 (Christopher Anderson) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (13, 1);

-- Coureur 114 (Emma Garcia) est une Femme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (14, 2);

-- Coureur 115 (Nicholas Martinez) est un Homme et un Junior
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (15, 1);
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (15, 3);

-- Coureur 116 (Olivia Miller) est une Femme et une Senior
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (16, 2);
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (16, 4);

-- Coureur 117 (William Taylor) est un Homme
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (17, 1);

-- Coureur 118 (Sophia Anderson) est une Femme et une Junior
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (18, 2);
INSERT INTO CoureurCategorie (id_coureur, id_categorie) VALUES (18, 3);


CREATE TABLE Classement (
    id_classement SERIAL PRIMARY KEY,
    id_etape INTEGER NOT NULL,
    id_coureur INTEGER NOT NULL,
    rang INTEGER NOT NULL,
    points INTEGER NOT NULL,
    FOREIGN KEY (id_etape) REFERENCES Etape(id_etape),
    FOREIGN KEY (id_coureur) REFERENCES Coureur(id_coureur)
);

-- Insérer des données de classement pour l'étape 1
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (1, 1, 1, 10);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (1, 2, 2, 6);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (1, 3, 3, 4);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (1, 4, 4, 2);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (1, 5, 5, 1);

-- Insérer des données de classement pour l'étape 2
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (2, 6, 1, 10);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (2, 7, 2, 6);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (2, 8, 3, 4);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (2, 9, 4, 2);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (2, 10, 5, 1);

-- Insérer des données de classement pour l'étape 3
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (3, 11, 1, 10);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (3, 12, 2, 6);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (3, 13, 3, 4);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (3, 14, 4, 2);
INSERT INTO Classement (id_etape, id_coureur, rang, points) VALUES (3, 15, 5, 1);

CREATE TABLE Participation (
    id_participation SERIAL PRIMARY KEY,
    id_etape INTEGER NOT NULL,
    id_coureur INTEGER NOT NULL,
    id_equipe INTEGER NOT NULL,
    heure_depart TIME,
    heure_arrivee TIME,
    FOREIGN KEY (id_etape) REFERENCES Etape(id_etape),
    FOREIGN KEY (id_coureur) REFERENCES Coureur(id_coureur),
    FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe)
);

-- BETSIZARAINA
-- Équipe A
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (1, 1, 1, '08:01:30', '10:32:15'); -- Lova
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (1, 2, 1, '08:02:45', '10:33:45'); -- Sabrina

-- Équipe B
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (1, 3, 2, '08:15:30', '10:46:20'); -- Justin
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (1, 4, 2, '08:17:10', '10:48:05'); -- Vero

-- Équipe C
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (1, 5, 3, '08:31:15', '11:01:55'); -- John
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (1, 6, 3, '08:33:20', '11:04:10'); -- Jill


--Mandrosoa
-- Équipe A
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (2, 1, 1, '09:00:45', '11:31:30'); -- Lova
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (2, 2, 1, '09:01:20', '11:32:45'); -- Sabrina

-- Équipe B
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (2, 3, 2, '09:16:00', '11:47:25'); -- Justin
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (2, 4, 2, '09:17:35', '11:49:15'); -- Vero

-- Équipe C
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (2, 5, 3, '09:32:40', '12:03:10'); -- John
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (2, 6, 3, '09:34:15', '12:04:55'); -- Jill


--Andapa
-- Équipe A
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (3, 7, 1, '08:02:20', '10:47:10'); -- Victor

-- Équipe B
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (3, 3, 2, '08:17:50', '11:02:40'); -- Justin

-- Équipe C
INSERT INTO Participation (id_etape, id_coureur, id_equipe, heure_depart, heure_arrivee) VALUES (3, 6, 3, '08:33:30', '11:18:20'); -- Jill
