-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2017 às 19:45
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colegio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `perfil` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `fkimagem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `email`, `data_nascimento`, `telefone`, `senha`, `perfil`, `status`, `fkimagem`, `data_cadastro`) VALUES
(4, 'wesllen alves', 'wesllenalves@gmail.com', '1993-09-24', '1111111111', 'e10adc3949ba59abbe56e057f20f883e', 'comum', 1, NULL, '2017-10-26 00:00:00'),
(5, 'lucas silva', 'wesllenalves@gmail.com', '0000-00-00', '1111111', '698dc19d489c4e4db73e28a713eab07b', 'comum', 1, NULL, '2017-10-27 18:19:03'),
(6, 'lucas ', 'wesllenalves@gmail.com', '1993-09-24', '11111111', '698dc19d489c4e4db73e28a713eab07b', 'comum', 1, NULL, '2017-10-27 14:20:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagemperfil`
--

CREATE TABLE `imagemperfil` (
  `idImagem` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagemperfil`
--

INSERT INTO `imagemperfil` (`idImagem`, `nome`) VALUES
(1, '1509126107.jpg'),
(2, '1509123771.jpg'),
(3, '1509123936.jpg'),
(4, '1509125994.jpg'),
(5, '1509126176.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `useimage`
--

CREATE TABLE `useimage` (
  `id` int(11) NOT NULL,
  `fkuser` int(11) NOT NULL,
  `fkimg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `useimage`
--

INSERT INTO `useimage` (`id`, `fkuser`, `fkimg`) VALUES
(1, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `imagemperfil`
--
ALTER TABLE `imagemperfil`
  ADD PRIMARY KEY (`idImagem`);

--
-- Indexes for table `useimage`
--
ALTER TABLE `useimage`
  ADD PRIMARY KEY (`id`,`fkuser`,`fkimg`),
  ADD KEY `fkuser` (`fkuser`),
  ADD KEY `fkuimg` (`fkimg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `imagemperfil`
--
ALTER TABLE `imagemperfil`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `useimage`
--
ALTER TABLE `useimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `useimage`
--
ALTER TABLE `useimage`
  ADD CONSTRAINT `fkuimg` FOREIGN KEY (`fkimg`) REFERENCES `imagemperfil` (`idImagem`),
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`fkuser`) REFERENCES `funcionario` (`idFuncionario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
