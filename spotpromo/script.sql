CREATE SCHEMA IF NOT EXISTS db_spotpromo
DEFAULT CHARACTER SET utf8mb4  ;

USE db_spotpromo;

CREATE TABLE `categoria` (
  `cod_categoria` int NOT NULL AUTO_INCREMENT,  
  `descricao` varchar(250) NOT NULL ,
  PRIMARY KEY (`cod_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

CREATE TABLE `produto` (
  `cod_produto` int NOT NULL AUTO_INCREMENT,
  `cod_categoria` int NOT NULL,
  `descricao` varchar(250) NOT NULL, 
  PRIMARY KEY (`cod_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

INSERT INTO categoria(descricao) values('Send Mail'),('Publicidade'),('ADSense');