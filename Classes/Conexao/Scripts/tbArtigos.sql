-- -----------------------------------------------------
-- Schema projetoTeste
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetoTeste` ;
USE `projetoTeste` ;

CREATE TABLE IF NOT EXISTS `projetoTeste`.`artigos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50),
  `link` VARCHAR(150),
  `id_usuario` INT,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

  INSERT INTO artigos VALUES(1, 'ArtigoTeste','https://artigoteste.com.br/',1),
  (2, 'ArtigoTeste','https://artigoteste.com.br/',1),
  (3, 'ArtigoTeste','https://artigoteste.com.br/',1)