-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Maio-2022 às 00:47
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `localidade`, `codigopostal`, `morada`, `capitalsocial`, `nif`, `email`, `telefone`, `designacaosocial`) VALUES
(1, 'Torres Vedras', '2222-123', 'Rua Principal 23', 0, '123132123', 'empresa@empresa.pt', '999888777', 'Empresa Faturaï¿½ï¿½o');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faturas`
--

INSERT INTO `faturas` (`id`, `data`, `valortotal`, `ivatotal`, `estado`, `usercliente_id`, `userfuncionario_id`) VALUES
(1, '2022-05-26 12:47:37', 0, 0, 0, 2, 3),
(5, '2022-05-26 18:49:31', 0, 0, 0, 7, 3),
(6, '2022-05-26 17:44:38', 0, 0, 0, 2, 1),
(7, '2022-05-26 17:58:27', 0, 0, 0, 7, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `emvigor`, `descricao`) VALUES
(1, 30, 1, 'Produtos'),
(2, 25, 1, 'Teste'),
(3, 12, 0, 'Compras'),
(4, 10, 1, 'Atualizar');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `preco`, `stock`, `iva_id`) VALUES
(1, '123132', 'Ananás', 0.5, 10, 1),
(2, '12312311', 'Tomateee', 0, 5, 1),
(3, '3213451', 'Cebola', 1, 10, 1),
(4, '12341142', 'Laranja', 3, 20, 4),
(5, '12358912', 'AnanÃ¡Ã¡s', 2, 5, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `localidade`, `codigopostal`, `morada`, `nif`, `telefone`, `email`, `password`, `username`, `role`) VALUES
(1, 'Torres Vedras', '2512-123', 'Rua x', '123123123', '912345678', 'dads@gmail.pt', 'teste123', 'Rafael Bento', 2),
(2, 'Torres', '2512-999', 'Rua z', '543216789', '123456789', 'diogo@gmail.com', '12345', 'Diogo5533', 3),
(3, 'Lourinhã', '2421-231', 'Rua laaa', '321451231', '912345672', 'asd@asc.com', 'pasdt', 'abc', 2),
(4, 'Torres', '2512-129', 'Rua 32', '1231322323', '123421212', '2345@outlook.pt', 'cliente123', 'Cliente', 3),
(5, 'Torres Vedras', '2512-121', 'Rua 31', '53423123', '1234212123', '23c45@outlook.pt', 'funcionario123', 'Funcionario', 2),
(6, 'Torres', '2512-126', 'Rua D', '1234311321', '987654321', 'mas@asd.pt', 'tomas123', 'Tomas', 3),
(7, 'Lourinhã', '2530-123', 'Rua principal Z', '543216789', '987123456', 'asd@gmail.pt', '123321', 'Joquim', 3),
(8, 'cdcdcv', '2512-1261', 'Rua xsaaqqssswwssw', '12213123', '13123321', '13', 'cdasdxx', 'asd', 2);

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
