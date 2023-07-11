create table sexe(
    id_sexe  serial primary key,
    Type VARCHAR(100)
);

insert into sexe values(default, 'Homme'); -- 1
insert into sexe values(default, 'Femme'); 

CREATE TABLE utilisateur(
    id_utilisateur serial PRIMARY KEY,
    prenoms_utilisateur VARCHAR (50) NOT NULL,
    email_utilisateur VARCHAR (100) NOT NULL unique,
    date_de_naissance Date,
    id_sexe int,
    mot_de_passe VARCHAR(100) NOT NULL,
    foreign key(id_sexe) references sexe(id_sexe)
);

INSERT INTO utilisateur (prenoms_utilisateur, email_utilisateur, date_de_naissance, id_sexe, mot_de_passe)
VALUES ('John Doe', 'john.doe@example.com', '1990-05-15', 1, 'motdepasse1');

INSERT INTO utilisateur (prenoms_utilisateur, email_utilisateur, date_de_naissance, id_sexe, mot_de_passe)
VALUES ('Jane Smith', 'jane.smith@example.com', '1988-09-23', 2, 'motdepasse2');

INSERT INTO utilisateur (prenoms_utilisateur, email_utilisateur, date_de_naissance, id_sexe, mot_de_passe)
VALUES ('Alice Johnson', 'alice.johnson@example.com', '1995-02-10', 2, 'motdepasse3');

INSERT INTO utilisateur (prenoms_utilisateur, email_utilisateur, date_de_naissance, id_sexe, mot_de_passe)
VALUES ('Bob Williams', 'bob.williams@example.com', '1992-11-08', 1, 'motdepasse4');

INSERT INTO utilisateur (prenoms_utilisateur, email_utilisateur, date_de_naissance, id_sexe, mot_de_passe)
VALUES ('Emma Davis', 'emma.davis@example.com', '1998-07-19', 2, 'motdepasse5');

create table code(
    id_code serial primary key,
    numero varchar(10) unique,
    montant numeric,
    etat int default 0,
    date_supression date default null
);


CREATE TABLE porte_monaie (
    id_porte_monaie SERIAL PRIMARY KEY,
    user_id INT,
    code INT,
    etat INT DEFAULT 0,
    date DATE DEFAULT NOW(),
    FOREIGN KEY (user_id) REFERENCES utilisateur (id_utilisateur),
    FOREIGN KEY (code) REFERENCES code (id_code)
);

create or replace view v_porte_monaie as
SELECT code.*, id_porte_monaie AS id, user_id AS user, porte_monaie.etat AS etat_porte_monaie
FROM porte_monaie
JOIN code ON porte_monaie.code = code.id_code;

create table caisse(
    id_caisse serial primary key,
    id_utilisateur int references utilisateur(id_utilisateur),
    id_code int references code(id_code),
    quantite_moins numeric,
    date_transaction date
);