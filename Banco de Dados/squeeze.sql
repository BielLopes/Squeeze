-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Out-2018 às 15:39
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `squeeze`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE `amigos` (
  `ID_amigo` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`ID_amigo`, `ID_Usuario`, `ID_Usuario2`) VALUES
(1, 2, 3),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

CREATE TABLE `artista` (
  `ID_Artista` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `ID_Genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artista`
--

INSERT INTO `artista` (`ID_Artista`, `Nome`, `ID_Genero`) VALUES
(1, 'AURORA', 3),
(2, 'Madonna', 2),
(3, 'SIA', 2),
(4, 'The Pretty Reckless', 1),
(6, 'Billie Eilish', 3),
(7, 'Pink Floyd', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito_artista`
--

CREATE TABLE `favorito_artista` (
  `ID_FA` int(11) NOT NULL,
  `ID_Artista` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `favorito_artista`
--

INSERT INTO `favorito_artista` (`ID_FA`, `ID_Artista`, `ID_Usuario`) VALUES
(1, 7, 4),
(2, 2, 3),
(3, 1, 2),
(4, 1, 3),
(5, 4, 4),
(6, 3, 3),
(7, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `Nome` varchar(20) NOT NULL,
  `ID_Genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`Nome`, `ID_Genero`) VALUES
('Rock', 1),
('POP', 2),
('Indie', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencia`
--

CREATE TABLE `preferencia` (
  `ID_preferencia` int(11) NOT NULL,
  `ID_Genero` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `preferencia`
--

INSERT INTO `preferencia` (`ID_preferencia`, `ID_Genero`, `ID_Usuario`) VALUES
(1, 3, 2),
(2, 2, 2),
(3, 1, 3),
(4, 2, 3),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Login` varchar(40) NOT NULL,
  `Senha` varchar(16) NOT NULL,
  `E-mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nome`, `Login`, `Senha`, `E-mail`) VALUES
(1, 'ADM - Cartarina', 'adm.squeeze', '123456', ''),
(2, 'Paulo Maciel', 'paulo.squeeze', '123456', ''),
(3, 'Gabriela Paixão', 'gabriela.squeeze', '123456', ''),
(4, 'Gabriel Galoma', 'gabriel.squeeze', '123456', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`ID_amigo`),
  ADD KEY `ID_amigo_3` (`ID_Usuario`),
  ADD KEY `ID_Usuario2` (`ID_Usuario2`);

--
-- Indexes for table `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`ID_Artista`),
  ADD KEY `ID_Genero` (`ID_Genero`);

--
-- Indexes for table `favorito_artista`
--
ALTER TABLE `favorito_artista`
  ADD PRIMARY KEY (`ID_FA`),
  ADD KEY `ID_Artista` (`ID_Artista`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_Genero`);

--
-- Indexes for table `preferencia`
--
ALTER TABLE `preferencia`
  ADD PRIMARY KEY (`ID_preferencia`),
  ADD KEY `ID_Genero` (`ID_Genero`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amigos`
--
ALTER TABLE `amigos`
  MODIFY `ID_amigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artista`
--
ALTER TABLE `artista`
  MODIFY `ID_Artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favorito_artista`
--
ALTER TABLE `favorito_artista`
  MODIFY `ID_FA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_Genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `preferencia`
--
ALTER TABLE `preferencia`
  MODIFY `ID_preferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `artista`
--
ALTER TABLE `artista`
  ADD CONSTRAINT `artista_ibfk_1` FOREIGN KEY (`ID_Genero`) REFERENCES `genero` (`ID_Genero`);

--
-- Limitadores para a tabela `favorito_artista`
--
ALTER TABLE `favorito_artista`
  ADD CONSTRAINT `favorito_artista_ibfk_1` FOREIGN KEY (`ID_Artista`) REFERENCES `artista` (`ID_Artista`),
  ADD CONSTRAINT `favorito_artista_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Limitadores para a tabela `preferencia`
--
ALTER TABLE `preferencia`
  ADD CONSTRAINT `preferencia_ibfk_1` FOREIGN KEY (`ID_Genero`) REFERENCES `genero` (`ID_Genero`),
  ADD CONSTRAINT `preferencia_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
