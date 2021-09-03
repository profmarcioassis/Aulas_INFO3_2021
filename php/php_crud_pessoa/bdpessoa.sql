-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2017 às 15:23
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdpessoa`
--
CREATE DATABASE IF NOT EXISTS `bdpessoa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdpessoa`;

-- --------------------------------------------------------


--
-- Estrutura da tabela `tbpessoa`
--

CREATE TABLE IF NOT EXISTS `tbpessoa` (
`idPessoa` int(11) NOT NULL,
  `nomePessoa` varchar(45) NOT NULL,
  `sobrenomePessoa` varchar(45) NOT NULL,
  `idadePessoa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpessoa`
--

INSERT INTO `tbpessoa` (`idPessoa`, `nomePessoa`, `sobrenomePessoa`, `idadePessoa`) VALUES
(1, 'Márcio', 'Assis', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbpessoa`
--
ALTER TABLE `tbpessoa`
 ADD PRIMARY KEY (`idPessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbpessoa`
--
ALTER TABLE `tbpessoa`
MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
