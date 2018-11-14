-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2018 às 03:43
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
  `ID_Usuario` int(11) NOT NULL,
  `ID_Usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`ID_Usuario`, `ID_Usuario2`) VALUES
(1, 3),
(1, 4),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

CREATE TABLE `artista` (
  `ID_Artista` int(11) NOT NULL,
  `Nome` varchar(20) CHARACTER SET utf8 NOT NULL,
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
(6, 3, 3),
(7, 2, 2),
(8, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `Nome` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ID_Genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`Nome`, `ID_Genero`) VALUES
('ROK', 1),
('POP', 2),
('Indie', 3),
('Classica', 4),
('Have Metal', 5),
('Funk', 7),
('Contry', 8),
('Boa', 9),
('PauloIndie', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencia`
--

CREATE TABLE `preferencia` (
  `ID_Genero` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `preferencia`
--

INSERT INTO `preferencia` (`ID_Genero`, `ID_Usuario`) VALUES
(2, 2),
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Senha` varchar(16) CHARACTER SET utf8 NOT NULL,
  `E-mail` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nome`, `Login`, `Senha`, `E-mail`) VALUES
(1, 'ADM - Cartarina', 'adm.squeeze', 'sqqsCTgBzid7Q', ''),
(2, 'Paulo Maciel', 'paulo.squeeze', 'sqqsCTgBzid7Q', ''),
(3, 'Gabriela Paix?o', 'gabriela.squeeze', 'sqqsCTgBzid7Q', ''),
(4, 'Gabriel Galoma', 'gabriel.squeeze', 'sqqsCTgBzid7Q', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`ID_Usuario`,`ID_Usuario2`),
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
  ADD PRIMARY KEY (`ID_Genero`,`ID_Usuario`),
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
-- AUTO_INCREMENT for table `artista`
--
ALTER TABLE `artista`
  MODIFY `ID_Artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `favorito_artista`
--
ALTER TABLE `favorito_artista`
  MODIFY `ID_FA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_Genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`ID_Usuario2`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `artista`
--
ALTER TABLE `artista`
  ADD CONSTRAINT `artista_ibfk_1` FOREIGN KEY (`ID_Genero`) REFERENCES `genero` (`ID_Genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `favorito_artista`
--
ALTER TABLE `favorito_artista`
  ADD CONSTRAINT `favorito_artista_ibfk_1` FOREIGN KEY (`ID_Artista`) REFERENCES `artista` (`ID_Artista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorito_artista_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `preferencia`
--
ALTER TABLE `preferencia`
  ADD CONSTRAINT `preferencia_ibfk_1` FOREIGN KEY (`ID_Genero`) REFERENCES `genero` (`ID_Genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferencia_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
