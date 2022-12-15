-- MySQL Script generated by MySQL Workbench
-- Thu Dec 15 20:39:03 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema TuZik?
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TuZik?
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TuZik?` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `TuZik?` ;

-- -----------------------------------------------------
-- Table `TuZik?`.`utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`utilisateur` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`utilisateur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(50) NULL DEFAULT NULL,
  `Prenom` VARCHAR(50) NULL DEFAULT NULL,
  `telephone` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  `motdepasse` VARCHAR(80) NOT NULL,
  `Num Magasin` VARCHAR(45) NULL DEFAULT 0,
  `Num Fabricant` VARCHAR(45) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`profilMagasin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`profilMagasin` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`profilMagasin` (
  `NumMagasin` INT NOT NULL,
  `adresse` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `horaires` VARCHAR(45) NOT NULL,
  `utilisateur_id` BIGINT NOT NULL,
  PRIMARY KEY (`NumMagasin`),
  CONSTRAINT `fk_profilMagasin_utilisateur`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_profilMagasin_utilisateur` ON `TuZik?`.`profilMagasin` (`utilisateur_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`profil fabricant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`profil fabricant` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`profil fabricant` (
  `NumFabricant` INT NOT NULL,
  `adresse` VARCHAR(45) NULL,
  `Nom` VARCHAR(45) NOT NULL,
  `spécialité` VARCHAR(45) NULL DEFAULT NULL,
  `prix` FLOAT NULL DEFAULT NULL,
  `utilisateurid` BIGINT NOT NULL,
  PRIMARY KEY (`NumFabricant`),
  CONSTRAINT `utilisateurid`
    FOREIGN KEY (`utilisateurid`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `utilisateurid` ON `TuZik?`.`profil fabricant` (`utilisateurid` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`categorie` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`categorie` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `parentId` BIGINT NULL,
  `Titre` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `parentid`
    FOREIGN KEY (`parentId`)
    REFERENCES `TuZik?`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `parentid` ON `TuZik?`.`categorie` (`parentId` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`produit` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`produit` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `utilisateur_Id` BIGINT NOT NULL,
  `Titre` VARCHAR(75) NOT NULL,
  `type` SMALLINT(6) NOT NULL DEFAULT 0,
  `prix` FLOAT NOT NULL DEFAULT 0,
  `idCategorie` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_produit_utilisateur`
    FOREIGN KEY (`utilisateur_Id`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCategorie`
    FOREIGN KEY (`idCategorie`)
    REFERENCES `TuZik?`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_produit_utilisateur` ON `TuZik?`.`produit` (`utilisateur_Id` ASC) VISIBLE;

CREATE INDEX `idCategorie` ON `TuZik?`.`produit` (`idCategorie` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`panier_objet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`panier_objet` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`panier_objet` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `produitId` BIGINT NOT NULL,
  `userId` BIGINT NOT NULL,
  `quantite` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_panier_objet_produit`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `userId`
    FOREIGN KEY (`userId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_panier_objet_produit` ON `TuZik?`.`panier_objet` (`produitId` ASC) VISIBLE;

CREATE INDEX `userId` ON `TuZik?`.`panier_objet` (`userId` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`Commande`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`Commande` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`Commande` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `userId` BIGINT NOT NULL,
  `sessionId` VARCHAR(100) NOT NULL,
  `shipping` FLOAT NOT NULL DEFAULT 0,
  `total` FLOAT NOT NULL DEFAULT 0,
  `grandTotal` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Commande_utilisateur`
    FOREIGN KEY (`userId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE INDEX `fk_Commande_utilisateur` ON `TuZik?`.`Commande` (`userId` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`Commande_objet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`Commande_objet` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`Commande_objet` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `produitId` BIGINT NOT NULL,
  `CommandeId` BIGINT NOT NULL,
  `quantité` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Commande_objet_produit`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_objet_Commande`
    FOREIGN KEY (`CommandeId`)
    REFERENCES `TuZik?`.`Commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE INDEX `fk_Commande_objet_produit` ON `TuZik?`.`Commande_objet` (`produitId` ASC) VISIBLE;

CREATE INDEX `fk_Commande_objet_Commande` ON `TuZik?`.`Commande_objet` (`CommandeId` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`paiement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`paiement` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`paiement` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `CommandeId` BIGINT NOT NULL,
  `code` VARCHAR(100) NOT NULL,
  `type` SMALLINT(6) NOT NULL DEFAULT 0,
  `mode` SMALLINT(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`, `code`, `type`),
  CONSTRAINT `fk_paiement_commande`
    FOREIGN KEY (`CommandeId`)
    REFERENCES `TuZik?`.`Commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE INDEX `fk_paiement_commande` ON `TuZik?`.`paiement` (`CommandeId` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `TuZik?`.`photo_produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`photo_produit` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`photo_produit` (
  `id` BIGINT NOT NULL,
  `produitId` BIGINT NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `produitId`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `produitId_idx` ON `TuZik?`.`photo_produit` (`produitId` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
