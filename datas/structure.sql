-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema phpooautoload
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema phpooautoload
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `phpooautoload` DEFAULT CHARACTER SET utf8 ;
USE `phpooautoload` ;

-- -----------------------------------------------------
-- Table `phpooautoload`.`theRole`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpooautoload`.`theRole` (
  `idtheRole` SMALLINT UNSIGNED NULL AUTO_INCREMENT,
  `theRoleName` VARCHAR(45) NOT NULL,
  `theRoleValue` SMALLINT UNSIGNED NULL DEFAULT 2,
  PRIMARY KEY (`idtheRole`),
  UNIQUE INDEX `theRoleName_UNIQUE` (`theRoleName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpooautoload`.`theUser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpooautoload`.`theUser` (
  `idtheUser` INT UNSIGNED NULL AUTO_INCREMENT,
  `theUserLogin` VARCHAR(80) NOT NULL,
  `theUserPwd` VARCHAR(255) NOT NULL,
  `theUserMail` VARCHAR(150) NOT NULL,
  `theRoleIdtheRole` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`idtheUser`),
  UNIQUE INDEX `theUserLogin_UNIQUE` (`theUserLogin` ASC),
  UNIQUE INDEX `theUserMail_UNIQUE` (`theUserMail` ASC),
  INDEX `fk_theUser_theRole_idx` (`theRoleIdtheRole` ASC),
  CONSTRAINT `fk_theUser_theRole`
    FOREIGN KEY (`theRoleIdtheRole`)
    REFERENCES `phpooautoload`.`theRole` (`idtheRole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpooautoload`.`theNews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpooautoload`.`theNews` (
  `idtheNews` INT UNSIGNED NULL AUTO_INCREMENT,
  `theNewsTitle` VARCHAR(180) NOT NULL,
  `theNewsSlug` VARCHAR(180) NOT NULL,
  `theNewsText` TEXT NOT NULL,
  `theNewsDate` DATE NULL DEFAULT CURRENT_TIMESTAMP,
  `theUserIdtheUser` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idtheNews`),
  UNIQUE INDEX `theNewsSlug_UNIQUE` (`theNewsSlug` ASC),
  INDEX `fk_theNews_theUser1_idx` (`theUserIdtheUser` ASC),
  CONSTRAINT `fk_theNews_theUser1`
    FOREIGN KEY (`theUserIdtheUser`)
    REFERENCES `phpooautoload`.`theUser` (`idtheUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpooautoload`.`theSection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpooautoload`.`theSection` (
  `idtheSection` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `theSectionName` VARCHAR(100) NOT NULL,
  `theSectionDesc` VARCHAR(800) NULL,
  PRIMARY KEY (`idtheSection`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpooautoload`.`theNews_has_theSection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpooautoload`.`theNews_has_theSection` (
  `theNews_idtheNews` INT UNSIGNED NOT NULL,
  `theSection_idtheSection` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`theNews_idtheNews`, `theSection_idtheSection`),
  INDEX `fk_theNews_has_theSection_theSection1_idx` (`theSection_idtheSection` ASC),
  INDEX `fk_theNews_has_theSection_theNews1_idx` (`theNews_idtheNews` ASC),
  CONSTRAINT `fk_theNews_has_theSection_theNews1`
    FOREIGN KEY (`theNews_idtheNews`)
    REFERENCES `phpooautoload`.`theNews` (`idtheNews`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_theNews_has_theSection_theSection1`
    FOREIGN KEY (`theSection_idtheSection`)
    REFERENCES `phpooautoload`.`theSection` (`idtheSection`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
