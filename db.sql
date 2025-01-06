-- Table Patient (utilisateurs)
CREATE TABLE patient (
    idpatient INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    login VARCHAR(100) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    numerodesecuritesociale VARCHAR(15) NOT NULL UNIQUE
);

-- Table Cabinet Médical
CREATE TABLE `cabinet médical` (
    id_CabinetMedical INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    telephone VARCHAR(15)
);

-- Table Médecin
CREATE TABLE medecin (
    id_medecin INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    specialite VARCHAR(100),
    id_CabinetMedical INT NOT NULL,
    FOREIGN KEY (id_CabinetMedical) REFERENCES `cabinet médical`(id_CabinetMedical)
);

-- Table Examen
CREATE TABLE examen (
    id_examen INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description VARCHAR(255)
);

-- Table Rendez-vous (RDV)
CREATE TABLE rdv (
    id_rdv INT AUTO_INCREMENT PRIMARY KEY,
    id_medecin INT NOT NULL,
    id_cabinetMedical INT NOT NULL,
    id_examen INT NOT NULL,
    id_patient INT NOT NULL,
    Date DATETIME NOT NULL,
    notes TEXT NULL,
    FOREIGN KEY (id_medecin) REFERENCES medecin(id_medecin),
    FOREIGN KEY (id_cabinetMedical) REFERENCES `cabinet médical`(id_CabinetMedical),
    FOREIGN KEY (id_examen) REFERENCES examen(id_examen),
    FOREIGN KEY (id_patient) REFERENCES patient(idpatient)
);
