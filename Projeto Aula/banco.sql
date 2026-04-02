-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projetophp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetophp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetophp` DEFAULT CHARACTER SET utf8 ;
USE `projetophp` ;

-- -----------------------------------------------------
-- Table `projetophp`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetophp`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetophp`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetophp`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `estoque` INT NOT NULL,
  `categorias_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_categorias_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_produtos_categorias`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `projetophp`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
