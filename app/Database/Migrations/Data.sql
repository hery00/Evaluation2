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
   longueur_km NUMERIC(10,2),
   nb_coureur INTEGER,
   rang_etape INTEGER,
   id_course INTEGER NOT NULL,
   depart TIMESTAMP,
   PRIMARY KEY(id_etape),
   FOREIGN KEY(id_course) REFERENCES Course(id_course)
);

INSERT INTO Etape (nom, longueur_km, nb_coureur, rang_etape, id_course, depart) 
VALUES 
('Betsizaraina', 150.5, 2, 1, 1, '2024-06-01 08:00:00'),
('Mandrosoa', 120.25, 3, 2, 1, '2024-06-02 09:00:00'),
('Andapa', 120.25, 3, 3, 1, '2024-06-03 10:00:00');


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
    id_equipe INTEGER NOT NULL,
    FOREIGN KEY (id_coureur) REFERENCES Coureur(id_coureur),
    FOREIGN KEY (id_equipe) REFERENCES equipe(id_equipe),
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id_categorie)
);

-- Coureur 101 (Rakoto) est un Homme dans l'équipe 1
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (1, 1, 1);

-- Coureur 102 (Randria) est une Femme dans l'équipe 1
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (2, 2, 1);

-- Coureur 103 (Michael) est un Homme dans l'équipe 2
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (3, 1, 2);

-- Coureur 104 (Emily Johnson) est une Femme dans l'équipe 2
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (4, 2, 2);

-- Coureur 105 (David Brown) est un Homme dans l'équipe 3
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (5, 1, 3);

-- Coureur 106 (Sarah Williams) est une Femme dans l'équipe 3
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (6, 2, 3);

-- Coureur 107 (Daniel Lee) est un Homme et un Senior dans l'équipe 4
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (7, 1, 4);
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (7, 4, 4);

-- Coureur 108 (Jessica Taylor) est une Femme et une Junior dans l'équipe 1
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (8, 2, 1);
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (8, 3, 1);

-- Coureur 109 (Ryan Martinez) est un Homme dans l'équipe 1
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (9, 1, 1);

-- Coureur 110 (Amanda White) est une Femme dans l'équipe 2
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (10, 2, 2);

-- Coureur 111 (Michael Dieu) est un Homme dans l'équipe 2
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (11, 1, 2);

-- Coureur 112 (Jennifer Rodriguez) est une Femme dans l'équipe 3
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (12, 2, 3);

-- Coureur 113 (Christopher Anderson) est un Homme dans l'équipe 3
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (13, 1, 3);

-- Coureur 114 (Emma Garcia) est une Femme dans l'équipe 4
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (14, 2, 4);

-- Coureur 115 (Nicholas Martinez) est un Homme et un Junior dans l'équipe 4
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (15, 1, 4);
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (15, 3, 4);

-- Coureur 116 (Olivia Miller) est une Femme et une Senior dans l'équipe 1
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (16, 2, 1);
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (16, 4, 1);

-- Coureur 117 (William Taylor) est un Homme dans l'équipe 1
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (17, 1, 1);

-- Coureur 118 (Sophia Anderson) est une Femme et une Junior dans l'équipe 2
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (18, 2, 2);
INSERT INTO CoureurCategorie (id_coureur, id_categorie, id_equipe) VALUES (18, 3, 2);

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
    arrivee TIMESTAMP,
    FOREIGN KEY (id_etape) REFERENCES Etape(id_etape),
    FOREIGN KEY (id_coureur) REFERENCES Coureur(id_coureur),
    FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe)
);




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


create table import_etape (
    etape VARCHAR(225),
    longueur NUMERIC(10,2),
    nb_coureur INTEGER,
    rang_etape INTEGER,
    date_depart DATE,
    heure_depart TIME
);

create table import_resultat(
    etape_rang INTEGER,
    numero_dossard INTEGER,
    nom VARCHAR(225),
    genre VARCHAR(25),
    date_naissance DATE,
    equipe VARCHAR(25),
    arrivee TIMESTAMP
);

create table import_point(
    classement INTEGER,
    points INTEGER
);

CREATE OR REPLACE VIEW vParticipationDetails AS
SELECT 
    p.id_participation,
    p.arrivee,
    e.depart,
    e.id_etape,
    e.nom AS etape_nom,
    e.longueur_km,
    e.nb_coureur,
    e.rang_etape,
    e.id_course,
    c.id_coureur,
    c.nom AS coureur_nom,
    c.numero_dossard,
    c.genre,
    c.date_naissance,
    eq.id_equipe,
    eq.nom AS equipe_nom
FROM 
    Participation p
JOIN 
    Etape e ON p.id_etape = e.id_etape
JOIN 
    Coureur c ON p.id_coureur = c.id_coureur
JOIN 
    Equipe eq ON p.id_equipe = eq.id_equipe;
