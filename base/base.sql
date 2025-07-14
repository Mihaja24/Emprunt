CREATE OR REPLACE TABLE emp_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre VARCHAR(10),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

CREATE OR REPLACE TABLE emp_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

CREATE OR REPLACE TABLE emp_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES emp_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES emp_membre(id_membre)
);

CREATE OR REPLACE TABLE emp_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES emp_objet(id_objet)
);

CREATE OR REPLACE TABLE emp_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES emp_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES emp_membre(id_membre)
);

-- Données de test : membres
INSERT INTO emp_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice Dupont', '1990-05-12', 'F', 'alice@example.com', 'Paris', 'mdp1', 'alice.jpg'),
('Bob Martin', '1985-08-23', 'M', 'bob@example.com', 'Lyon', 'mdp2', 'bob.jpg'),
('Carla Rossi', '1992-11-03', 'F', 'carla@example.com', 'Marseille', 'mdp3', 'carla.jpg'),
('David Leroy', '1988-02-17', 'M', 'david@example.com', 'Toulouse', 'mdp4', 'david.jpg');

-- Données de test : catégories
INSERT INTO emp_categorie_objet (nom_categorie) VALUES
('esthétique'),
('bricolage'),
('mécanique'),
('cuisine');

-- Données de test : objets (10 par membre, répartis sur les catégories)
INSERT INTO emp_objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux', 1, 1),
('Trousse de maquillage', 1, 1),
('Perceuse', 2, 1),
('Tournevis', 2, 1),
('Clé à molette', 3, 1),
('Pompe à vélo', 3, 1),
('Mixeur', 4, 1),
('Casserole', 4, 1),
('Fer à lisser', 1, 1),
('Batteur électrique', 4, 1),

('Pinceau', 1, 2),
('Scie', 2, 2),
('Marteau', 2, 2),
('Cric', 3, 2),
('Clé dynamométrique', 3, 2),
('Robot pâtissier', 4, 2),
('Poêle', 4, 2),
('Épilateur', 1, 2),
('Tournevis électrique', 2, 2),
('Extracteur de jus', 4, 2),

('Lisseur', 1, 3),
('Pistolet à colle', 2, 3),
('Tournevis plat', 2, 3),
('Pompe à voiture', 3, 3),
('Clé plate', 3, 3),
('Blender', 4, 3),
('Moule à gâteau', 4, 3),
('Brosse à cheveux', 1, 3),
('Scie sauteuse', 2, 3),
('Cafetière', 4, 3),

('Brosse à dents électrique', 1, 4),
('Perceuse sans fil', 2, 4),
('Tournevis cruciforme', 2, 4),
('Compresseur', 3, 4),
('Clé Allen', 3, 4),
('Grille-pain', 4, 4),
('Poêle à frire', 4, 4),
('Rasoir électrique', 1, 4),
('Scie circulaire', 2, 4),
('Bouilloire', 4, 4);

-- Données de test : emprunts
INSERT INTO emp_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2024-06-01', '2024-06-05'),
(12, 1, '2024-06-02', '2024-06-06'),
(23, 4, '2024-06-03', '2024-06-07'),
(5, 3, '2024-06-04', '2024-06-08'),
(16, 2, '2024-06-05', '2024-06-09'),
(27, 1, '2024-06-06', '2024-06-10'),
(8, 4, '2024-06-07', '2024-06-11'),
(19, 3, '2024-06-08', '2024-06-12'),
(30, 2, '2024-06-09', '2024-06-13'),
(35, 1, '2024-06-10', '2024-06-14');

