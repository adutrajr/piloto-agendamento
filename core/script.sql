/** Cria a base de dados, que por enquanto só tem a tabela usuario e um usuário registrado.
 * O login do usuário criado é 'admin' e a senha é '123' que fica registrada na base como um 
 * hash 'sha256'.
 */

CREATE DATABASE  IF NOT EXISTS `agendamento`;
USE `agendamento`;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `nome` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;

INSERT INTO `usuario` VALUES (1,'admin','426413e9a07eade233324be574bbf1d01a31ac7f6872d34f07e09e2dbbac990e','Administrador do Sistema');

UNLOCK TABLES;
