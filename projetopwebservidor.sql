-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Maio-2022 às 10:09
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetopwebservidor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localidade` varchar(255) NOT NULL,
  `codigopostal` varchar(9) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `capitalsocial` varchar(20) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `designacaosocial` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturas`
--

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valortotal` float NOT NULL,
  `ivatotal` float NOT NULL,
  `estado` varchar(50) NOT NULL,
  `usercliente_id` int(11) NOT NULL,
  `userfuncionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`usercliente_id`),
  KEY `userfuncionarioid` (`userfuncionario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentagem` int(11) NOT NULL,
  `emvigor` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafaturas`
--

DROP TABLE IF EXISTS `linhafaturas`;
CREATE TABLE IF NOT EXISTS `linhafaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `valoriva` float NOT NULL,
  `valorunitario` float NOT NULL,
  `fatura_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fatura_id` (`fatura_id`),
  KEY `produto_id` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `stock` int(11) NOT NULL,
  `iva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localidade` varchar(255) NOT NULL,
  `codigopostal` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `faturas`
--
ALTER TABLE `faturas`
  ADD CONSTRAINT `faturas_ibfk_1` FOREIGN KEY (`usercliente_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `faturas_ibfk_2` FOREIGN KEY (`userfuncionario_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `linhafaturas`
--
ALTER TABLE `linhafaturas`
  ADD CONSTRAINT `linhafaturas_ibfk_1` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`),
  ADD CONSTRAINT `linhafaturas_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
