-- -----------------------------------------------------
-- Schema projetoTeste
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetoTeste` ;
USE `projetoTeste` ;

-- COGIGO PARA MUDAR OS CARACTERES DO BANCO PARA RECONHECER PT-BR
-- ALTER DATABASE `sua_base` CHARSET = Latin1 COLLATE = latin1_swedish_ci;

-- -----------------------------------------------------
-- Table `mydb`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoTeste`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NULL,
  `senha` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO usuario VALUES(1, 'admin', 'admin')