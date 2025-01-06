INSERT INTO `cabinet médical` (nom, adresse, ville, telephone) VALUES
('Cabinet Nord Santé', '123 rue de Lille', 'Lille', '0320001111'),
('Centre Médical Sud', '45 avenue de Paris', 'Paris', '0142002222');

INSERT INTO medecin (nom, specialite, id_CabinetMedical) VALUES
('Dr Jean Dupont', 'Cardiologie', 1),
('Dr Marie Curie', 'Radiologie', 1),
('Dr Louis Pasteur', 'Neurologie', 2);

INSERT INTO medecin (nom, specialite, id_CabinetMedical) VALUES
('Dr Jean Dupont', 'Cardiologie', 1),
('Dr Marie Curie', 'Radiologie', 1),
('Dr Louis Pasteur', 'Neurologie', 2);

INSERT INTO examen (nom, description) VALUES
('IRM', 'Imagerie par Résonance Magnétique'),
('Scanner', 'Tomodensitométrie'),
('Radio', 'Radiographie standard');
