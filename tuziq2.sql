-- MySQL Script generated by MySQL Workbench
-- Tue Jan 10 10:55:37 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
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
CREATE TABLE IF NOT EXISTS `TuZik?`.`utilisateur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(50) NULL DEFAULT NULL,
  `Prenom` VARCHAR(50) NULL DEFAULT NULL,
  `telephone` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  `motdepasse` VARCHAR(80) NOT NULL,
  `NumMagasin` BIGINT NULL DEFAULT 0,
  `NumFabricant` BIGINT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`profilmagasin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`profilmagasin` (
  `NumMagasin` BIGINT NOT NULL AUTO_INCREMENT,
  `adresse` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `horaires` VARCHAR(45) NOT NULL,
  `utilisateurId` BIGINT NOT NULL,
  PRIMARY KEY (`NumMagasin`),
  CONSTRAINT `fk_profilMagasin_utilisateur`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`profilfabricant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`profilfabricant` (
  `NumFabricant` BIGINT NOT NULL AUTO_INCREMENT,
  `adresse` VARCHAR(45) NULL DEFAULT NULL,
  `Nom` VARCHAR(45) NOT NULL,
  `specialite` VARCHAR(45) NULL DEFAULT NULL,
  `prix` FLOAT NULL DEFAULT NULL,
  `utilisateurId` BIGINT NOT NULL,
  PRIMARY KEY (`NumFabricant`),
  CONSTRAINT `utilisateurId`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TuZik?`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`categorie` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `Titre` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`article` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `utilisateurId` BIGINT NOT NULL,
  `Titre` VARCHAR(75) NOT NULL,
  `quantite` FLOAT NOT NULL DEFAULT 0,
  `prix` FLOAT NOT NULL DEFAULT 0,
  `idCategorie` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_produit_utilisateur`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idCategorie`
    FOREIGN KEY (`idCategorie`)
    REFERENCES `TuZik?`.`categorie` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TuZik?`.`photo_article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`photo_article` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `articleId` BIGINT NOT NULL,
  `image` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_photo_article_article`
    FOREIGN KEY (`articleId`)
    REFERENCES `TuZik?`.`article` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`Commande`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `TuZik?`.`Commande` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `utilisateurId` BIGINT NOT NULL,
  `sessionId` VARCHAR(100) NOT NULL,
  `shipping` VARCHAR(100) NOT NULL DEFAULT 0,
  `total` FLOAT NOT NULL DEFAULT 0,
  `dateCommande` VARCHAR(25) NOT NULL DEFAULT 0,
  `shippingStatus` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Commande_utilisateur`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
    ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `TuZik?`.`commande_article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`commande_article` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `produitId` BIGINT NULL,
  `commandeId` BIGINT NOT NULL,
  `quantite` FLOAT NOT NULL DEFAULT 0,
  `shippingStatus` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_commande_article_article`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`article` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_commande_article_commande`
    FOREIGN KEY (`commandeId`)
    REFERENCES `TuZik?`.`commande` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`panier_article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`panier_article` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `produitId` BIGINT NULL,
  `utilisateurId` BIGINT NOT NULL,
  `quantite` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_panier_objet_produit`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`article` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_panier_article_utilisateur`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`paiement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`paiement` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `CommandeId` BIGINT NOT NULL,
  `code` VARCHAR(100) NOT NULL,
  `type` VARCHAR(25) NOT NULL DEFAULT '€',
  `mode` VARCHAR(25) NOT NULL DEFAULT 'PayPal',
  `paymentStatus` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`, `code`, `type`),
  CONSTRAINT `fk_paiement_commande`
    FOREIGN KEY (`CommandeId`)
    REFERENCES `TuZik?`.`Commande` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`profilmusicien`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`profilmusicien` (
  `NumMusicien` BIGINT NOT NULL AUTO_INCREMENT,
  `adresse` VARCHAR(45) NOT NULL,
  `niveau` VARCHAR(45) NULL,
  `instrument` VARCHAR (80) NULL,
  `bio` VARCHAR (80) NULL,
  `utilisateurId` BIGINT NOT NULL,
  PRIMARY KEY (`NumMusicien`),
  CONSTRAINT `fk_profilMusicien_utilisateur`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`profilmusicien`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TuZik?`.`listesouhaits` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `article` VARCHAR(45) NOT NULL,
  `quantiteSouhaite` FLOAT NOT NULL DEFAULT 1,
  `quantitePossede` FLOAT NOT NULL DEFAULT 0,
  `utilisateurId` BIGINT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_listesouhaits_utilisateur`
    FOREIGN KEY (`utilisateurId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
