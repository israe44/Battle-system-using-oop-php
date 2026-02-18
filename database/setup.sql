CREATE DATABASE IF NOT EXISTS game_characters;
USE game_characters;
CREATE TABLE IF NOT EXISTS characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NOM VARCHAR(50),
    TYPE VARCHAR (50),
    HP INT,
    HP_MAX INT,
    PUISSANCE INT,
    ARMURE INT,
    MANA INT,
    AGILITE INT,
    CREATED_AT DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP PROCEDURE IF EXISTS add_character;
DELIMITER $$
CREATE PROCEDURE add_character (
    IN p_nom VARCHAR(50),
    IN p_type VARCHAR(50),
    IN p_hp INT,
    IN p_hp_max INT,
    IN p_puissance INT,
    IN p_armure INT,
    IN p_mana INT,
    IN p_agilite INT
)
BEGIN --like { in php 
INSERT INTO characters (nom, type, hp, hp_max, puissance, armure, mana, agilite)
VALUES (p_nom, p_type, p_hp, p_hp_max, p_puissance, p_armure, p_mana, p_agilite);
END $$ --like } in php 
