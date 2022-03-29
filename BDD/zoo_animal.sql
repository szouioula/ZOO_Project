DROP DATABASE IF EXISTS zoo_animal;
CREATE DATABASE zoo_animal;
USE zoo_animal;

CREATE TABLE zoos (
    zoo_id int(11) NOT NULL AUTO_INCREMENT,
    zoo_name varchar(100) NOT NULL,
    primary key (zoo_id)
) ENGINE = InnoDB;

CREATE TABLE enclos(
    enclos_id INT(11) NOT NULL AUTO_INCREMENT,
    enclos_size INT(11) NOT NULL,
    enclos_env varchar(100) NOT NULL,
    enclos_nom varchar(100) NOT NULL,
    enclos_empty  boolean NOT NULL,
    enclos_capacity INT(3) NOT NULL,
    enclos_zoo_id INT(3) NOT NULL,
    CONSTRAINT FK_zoo_id FOREIGN KEY (enclos_zoo_id) REFERENCES zoos (zoo_id),
    primary key (enclos_id)
)ENGINE = InnoDB;

CREATE TABLE animals(
    animal_id int(11) NOT NULL AUTO_INCREMENT,
    animal_name varchar(100) NOT NULL,
    animal_species varchar(100) NOT NULL,
    animal_entryDate datetime NOT NULL,
    animal_gender varchar(50) NOT NULL,
    animal_parent_id int (11) NOT NULL,
    animal_picture varchar(255) NOT NULL,
    animal_diet varchar(255) NOT NULL,
    animal_treatment varchar(255) NOT NULL,
    animal_deathDate datetime DEFAULT NULL,
    animal_info text DEFAULT NULL,
    animal_enclos_id int(11) DEFAULT NULL, 
   
    
    CONSTRAINT FK_enclos_id FOREIGN KEY (animal_enclos_id) REFERENCES enclos (enclos_id),
    primary key (animal_id)
) ENGINE = InnoDB;

CREATE TABLE healers(
    healer_id int(11) NOT NULL AUTO_INCREMENT,
    healer_first_name varchar(100) NOT NULL,
    healer_last_name varchar(100) NOT NULL,
    healer_entryDate datetime NOT NULL,
    healer_gender varchar(50) NOT NULL,
    healer_phone int (20) NOT NULL,
    healer_picture varchar(255) NOT NULL,
    healer_speciality varchar(100) NOT NULL,
    healer_nb_enclos_max int (3) NOT NULL,
    healer_id_sup int(11) DEFAULT NULL,
    healer_checkout_date datetime NOT NULL,
    healer_info text DEFAULT NULL,
    CONSTRAINT FK_healer_sup FOREIGN KEY (healer_id_sup) REFERENCES healers (healer_id),
    primary key (healer_id)
) ENGINE = InnoDB;

CREATE TABLE healers_animals(
    healer_id INT(11) NOT NULL,
    animal_id INT(11) NOT NULL,
    primary key (healer_id, animal_id),
    foreign key (healer_id) REFERENCES healers (healer_id),
    foreign key (animal_id) REFERENCES animals (animal_id)
)ENGINE = InnoDB;



