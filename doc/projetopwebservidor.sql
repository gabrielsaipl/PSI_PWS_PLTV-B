-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Jun-2022 às 15:56
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
  `capitalsocial` float NOT NULL,
  `nif` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `designacaosocial` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `localidade`, `codigopostal`, `morada`, `capitalsocial`, `nif`, `email`, `telefone`, `designacaosocial`) VALUES
(5, 'Torres Vedras', '2560-500', 'Travessa de Torres Vedras nÂº15', 15000, '742565384', 'empresaFaturaÃ§Ã£o@empresa.pt', '261456753', 'Empresa de FaturaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturas`
--

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(20) NOT NULL,
  `valortotal` float NOT NULL,
  `ivatotal` float NOT NULL,
  `estado` int(11) NOT NULL,
  `usercliente_id` int(11) NOT NULL,
  `userfuncionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`usercliente_id`),
  KEY `userfuncionarioid` (`userfuncionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faturas`
--

INSERT INTO `faturas` (`id`, `data`, `valortotal`, `ivatotal`, `estado`, `usercliente_id`, `userfuncionario_id`) VALUES
(13, '2022-06-16 15:20:41', 32.59, 3.8167, 1, 18, 13),
(14, '2022-06-16 15:33:00', 20.7, 3.641, 0, 20, 13),
(15, '2022-06-16 15:37:04', 12.74, 1.2912, 1, 19, 13),
(16, '2022-06-16 15:40:07', 31.1, 2.583, 1, 20, 14),
(17, '2022-06-16 15:43:21', 42.38, 4.6544, 1, 20, 14),
(18, '2022-06-16 15:44:46', 22.67, 3.8321, 0, 16, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentagem` int(11) NOT NULL,
  `emvigor` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `emvigor`, `descricao`) VALUES
(5, 23, 1, 'Taxa Normal'),
(6, 13, 1, 'Taxa IntermÃ©dia'),
(7, 6, 1, 'Taxa Reduzida'),
(8, 30, 0, 'Taxa Alta'),
(9, 3, 0, 'Taxa Baixa');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `linhafaturas`
--

INSERT INTO `linhafaturas` (`id`, `quantidade`, `valoriva`, `valorunitario`, `fatura_id`, `produto_id`) VALUES
(13, 3, 0.2875, 1.25, 13, 11),
(14, 3, 0.26, 2, 13, 6),
(15, 4, 0.24, 4, 13, 10),
(16, 1, 0.208, 1.6, 13, 14),
(17, 1, 0.7475, 3.25, 13, 17),
(18, 1, 0.2587, 1.99, 13, 19),
(19, 3, 0.2875, 1.25, 14, 11),
(20, 2, 0.368, 1.6, 14, 20),
(21, 2, 0.345, 1.5, 14, 7),
(22, 3, 0.325, 2.5, 14, 8),
(23, 1, 0.26, 2, 14, 6),
(24, 2, 0.03, 0.5, 14, 13),
(25, 1, 0.0575, 0.25, 14, 9),
(26, 1, 0.2875, 1.25, 15, 11),
(27, 2, 0.045, 0.75, 15, 12),
(28, 1, 0.325, 2.5, 15, 8),
(29, 5, 0.03, 0.5, 15, 13),
(31, 1, 0.18, 3, 15, 15),
(32, 1, 0.2587, 1.99, 15, 19),
(33, 1, 0.345, 1.5, 16, 7),
(34, 3, 0.24, 4, 16, 10),
(35, 2, 0.325, 2.5, 16, 8),
(36, 1, 0.208, 1.6, 16, 14),
(37, 2, 0.18, 3, 16, 15),
(38, 10, 0.03, 0.5, 16, 13),
(39, 2, 0.7475, 3.25, 17, 17),
(40, 5, 0.24, 4, 17, 10),
(41, 2, 0.26, 2, 17, 6),
(42, 2, 0.045, 0.75, 17, 12),
(43, 2, 0.2587, 1.99, 17, 19),
(44, 4, 0.208, 1.6, 17, 14),
(45, 2, 0.2875, 1.25, 18, 11),
(46, 1, 0.26, 2, 18, 6),
(47, 5, 0.03, 0.5, 18, 13),
(48, 1, 0.208, 1.6, 18, 14),
(49, 2, 0.2587, 1.99, 18, 19),
(50, 2, 0.7475, 3.25, 18, 17),
(51, 1, 0.2587, 1.99, 18, 19),
(52, 1, 0.368, 1.6, 18, 20);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `preco`, `stock`, `iva_id`) VALUES
(6, '1000000001', 'Laranja', 2, 13, 6),
(7, '1003000002', 'Cebola', 1.5, 12, 5),
(8, '1030004008', 'Tomate', 2.5, 54, 6),
(9, '1003004501', 'AnanÃ¡s', 0.25, 4, 5),
(10, '1036500214', 'Banana', 4, 25, 7),
(11, '1101210002', 'MaÃ§Ã£', 1.25, 16, 5),
(12, '1200032103', 'PÃªssego', 0.75, 36, 7),
(13, '1221002001', 'Uva', 0.5, 28, 7),
(14, '1230000201', 'PÃªra', 1.6, 1, 6),
(15, '1121020031', 'LimÃ£o', 3, 7, 7),
(16, '1321110001', 'Abacaxi', 5, 0, 5),
(17, '1132210001', 'Milho', 3.25, 12, 5),
(18, '1165423001', 'Alho', 0.5, 26, 7),
(19, '1332014032', 'Alface', 1.99, 13, 6),
(20, '1230111002', 'PimentÃ£o', 1.6, 5, 5);

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
  `nif` varchar(13) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `localidade`, `codigopostal`, `morada`, `nif`, `telefone`, `email`, `password`, `username`, `role`) VALUES
(12, 'Torres Vedras', '2560-123', 'Travessa de Torres Vedras', '753684156', '936245768', 'admin@empresa.pt', 'admin', 'admin', 1),
(13, 'Torres Vedras', '2560-131', 'Rua Principal nÂº15', '962476315', '934567268', 'rafael@empresa.pt', 'rafaelpass', 'Rafael Bento', 2),
(14, 'Torres Vedras', '2560-134', 'Rua Principal nÂº23', '275689956', '924578624', 'gabriel@empresa.pt', 'gabrielpass', 'Gabriel SÃ¡', 2),
(15, 'Torres Vedras', '2560-411', 'Travessa de Torres Vedras nÂº81', '963586156', '914625786', 'tomas@empresa.pt', 'tomaspass', 'TomÃ¡s JerÃ³nimo', 2),
(16, 'LourinhÃ£', '2530-312', 'Rua Principal nÂº23', '865145263', '965784258', 'joao@gmail.pt', 'joaopass', 'JoÃ£o Martins', 3),
(17, 'Torres Vedras', '2560-344', 'Travessa de Torres Vedras nÂº50', '651425852', '914526875', 'joaquim@gmail.pt', 'joaquimpass', 'Joaquim Manuel', 3),
(18, 'LourinhÃ£', '2530-441', 'Travessa da LourinhÃ£ nÂº43', '126453654', '936845666', 'ines@gmail.pt', 'inespass', 'InÃªs Sousa', 3),
(19, 'Lisboa', '1113-234', 'Rua dos Santos nÂº32', '789658152', '987856365', 'maria@gmail.pt', 'mariapass', 'Maria Joana', 3),
(20, 'Lisboa', '1113-512', 'Travessa de Lisboa nÂº53', '865745589', '962456862', 'francisco@gmail.pt', 'franciscopass', 'Francisco Vicente', 3),
(21, 'Torres Vedras', '2560-310', 'Travessa de Torres Vedras nÂº31', '965456259', '936663258', 'mariana@gmail.pt', 'marianapass', 'Mariana Antunes', 3),
(22, 'Torres Vedras', '2560-134', 'Travessa de Torres Vedras nÂº45', '462158326', '936654796', 'beatriz@gmail.pt', 'beatrizpass', 'Beatriz Maria', 3);

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
