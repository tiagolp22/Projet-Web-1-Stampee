-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema stampee
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema stampee
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `stampee` DEFAULT CHARACTER SET utf8mb4 ;
USE `stampee` ;

-- -----------------------------------------------------
-- Table `stampee`.`stampee_privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_privilege` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `privilege` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(80) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `id_privilege` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_privilege` (`id_privilege` ASC) ,
  CONSTRAINT `stampee_utilisateur_ibfk_1`
    FOREIGN KEY (`id_privilege`)
    REFERENCES `stampee`.`stampee_privilege` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_timbre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_timbre` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timbre_nom` VARCHAR(80) NOT NULL,
  `date_creation` DATE NOT NULL,
  `couleurs` VARCHAR(45) NOT NULL,
  `tirage` VARCHAR(100) NOT NULL,
  `dimensions` VARCHAR(20) NOT NULL,
  `pays_origine` VARCHAR(100) NOT NULL,
  `categorie` VARCHAR(100) NOT NULL,
  `condition_etat` VARCHAR(11) NOT NULL,
  `certifie` VARCHAR(50) NOT NULL DEFAULT '0',
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_utilisateur` (`id_user` ASC) ,
  CONSTRAINT `stampee_timbre_ibfk_5`
    FOREIGN KEY (`id_user`)
    REFERENCES `stampee`.`stampee_user` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_enchere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_enchere` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `prix_min` DECIMAL(10,2) NOT NULL,
  `date_debut` DATETIME NOT NULL,
  `date_fin` DATETIME NOT NULL,
  `coup_de_coeur` TINYINT(1) NOT NULL DEFAULT 0,
  `id_user` INT(11) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `id_timbre` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_utilisateur` (`id_user` ASC) ,
  INDEX `id_timbre` (`id_timbre` ASC) ,
  CONSTRAINT `stampee_enchere_ibfk_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `stampee`.`stampee_user` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `stampee_enchere_ibfk_2`
    FOREIGN KEY (`id_timbre`)
    REFERENCES `stampee`.`stampee_timbre` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_favoris`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_favoris` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `id_enchere` INT(11) NOT NULL,
  `date_ajout` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_utilisateur` (`id_user` ASC) ,
  INDEX `id_enchere` (`id_enchere` ASC) ,
  CONSTRAINT `stampee_favoris_ibfk_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `stampee`.`stampee_user` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `stampee_favoris_ibfk_2`
    FOREIGN KEY (`id_enchere`)
    REFERENCES `stampee`.`stampee_enchere` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_image` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image_principale` VARCHAR(255) NOT NULL,
  `images` VARCHAR(255) NULL DEFAULT NULL,
  `id_timbre` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_timbre` (`id_timbre` ASC) ,
  CONSTRAINT `stampee_image_ibfk_1`
    FOREIGN KEY (`id_timbre`)
    REFERENCES `stampee`.`stampee_timbre` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_mise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_mise` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `prix_offert` DECIMAL(10,2) NOT NULL,
  `date_heure` DATETIME NOT NULL,
  `id_enchere` INT(11) NOT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_enchere` (`id_enchere` ASC) ,
  INDEX `id_utilisateur` (`id_user` ASC) ,
  CONSTRAINT `stampee_mise_ibfk_1`
    FOREIGN KEY (`id_enchere`)
    REFERENCES `stampee`.`stampee_enchere` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `stampee_mise_ibfk_2`
    FOREIGN KEY (`id_user`)
    REFERENCES `stampee`.`stampee_user` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
