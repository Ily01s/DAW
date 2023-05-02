CREATE TABLE utilisateur (
    id     INT  NOT NULL AUTO_INCREMENT,
    nom    TEXT NOT NULL,
    prenom TEXT NOT NULL,
    NE     TEXT NOT NULL,
    email  TEXT NOT NULL,
    date   DATE NOT NULL,
    mdp    TEXT NOT NULL,
    role   TEXT NOT NULL,
    token  TEXT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE cours (
    id         INT          NOT NULL AUTO_INCREMENT,
    professeur INT          NOT NULL,
    uid        VARCHAR(13)  NOT NULL UNIQUE,
    nom        VARCHAR(255) NOT NULL,
    Dtime       DATE         NOT NULL,
    img        TEXT,
    PRIMARY KEY (id),
    CONSTRAINT cour_ufk_1 FOREIGN KEY (professeur) REFERENCES utilisateur (id)
);

CREATE TABLE user_courses (
    id     INT NOT NULL AUTO_INCREMENT,
    idUser INT NOT NULL,
    idCour INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT uc_user_fk FOREIGN KEY (idUser) REFERENCES utilisateur (id),
    CONSTRAINT uc_cour_fk FOREIGN KEY (idCour) REFERENCES cour (id)
);

CREATE TABLE sujet (
    id  INT NOT NULL AUTO_INCREMENT,
    nom INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE qcm (
    id bigint(13) NOT NULL UNIQUE,
    professeur INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT qcm_ufk_1 FOREIGN KEY (professeur) REFERENCES utilisateur (id)
);

CREATE TABLE question (
    id    INT  NOT NULL AUTO_INCREMENT,
    titre TEXT NOT NULL,
    qcm   INT  NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE reponse (
    id       INT  NOT NULL AUTO_INCREMENT,
    titre    TEXT NOT NULL,
    question INT  NOT NULL,
    resultat TEXT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE message (
    id    INT      NOT NULL AUTO_INCREMENT,
    texte TEXT     NOT NULL,
    date  DATETIME NOT NULL,
    sujet TEXT     NOT NULL,
    PRIMARY KEY (id)
);

