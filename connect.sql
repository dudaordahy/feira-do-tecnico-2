-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2025 às 16:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `connect`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `preferencias`
--

CREATE TABLE `preferencias` (
  `PreferenciaID` int(11) NOT NULL,
  `Nome` varchar(150) NOT NULL,
  `Imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `preferencias`
--

INSERT INTO `preferencias` (`PreferenciaID`, `Nome`, `Imagem`) VALUES
(1, 'gastronomia', ''),
(2, 'esportes', ''),
(3, 'cultura', ''),
(4, 'tecnologia', ''),
(5, 'pets', ''),
(6, 'plantas', ''),
(7, 'trabalho', ''),
(8, 'religião', ''),
(9, 'jogos online', ''),
(10, 'música', ''),
(11, 'preferencia11', ''),
(12, 'preferencia12', ''),
(13, 'preferencia13', ''),
(14, 'preferencia14', ''),
(15, 'preferencia15', ''),
(16, 'preferencia 16', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nome_completo` varchar(100) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` varchar(16) NOT NULL,
  `CEP` int(8) NOT NULL,
  `Endereco` varchar(150) NOT NULL,
  `Numero` int(5) NOT NULL,
  `Imagem` varchar(255) NOT NULL,
  `Cidade` varchar(150) NOT NULL,
  `Estado` varchar(2) NOT NULL,
  `Distancia` int(11) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nome_completo`, `Usuario`, `Email`, `Senha`, `CEP`, `Endereco`, `Numero`, `Imagem`, `Cidade`, `Estado`, `Distancia`, `Latitude`, `Longitude`) VALUES
(1, 'Eduarda Ordahy Sciortino', 'dudaordahy', 'dudasciortino@gmail.com', 'dudaordahy', 90660280, 'Rua Humberto de Campos', 1196, '', 'Porto Alegre', 'RS', 0, -30.0592, -51.1958);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_preferencias`
--

CREATE TABLE `usuarios_preferencias` (
  `ID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `PreferenciaID` int(11) NOT NULL,
  `Ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios_preferencias`
--

INSERT INTO `usuarios_preferencias` (`ID`, `UsuarioID`, `PreferenciaID`, `Ordem`) VALUES
(47, 2, 1, 0),
(48, 2, 2, 1),
(49, 2, 3, 2),
(50, 2, 4, 3),
(51, 2, 5, 4),
(52, 2, 6, 5),
(53, 2, 7, 6),
(54, 2, 9, 7),
(55, 2, 10, 8),
(56, 2, 11, 9),
(87, 1, 1, 0),
(88, 1, 2, 1),
(89, 1, 3, 2),
(90, 1, 4, 3),
(91, 1, 5, 4),
(92, 1, 6, 5),
(93, 1, 7, 6),
(94, 1, 8, 7),
(95, 1, 9, 8),
(96, 1, 10, 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `preferencias`
--
ALTER TABLE `preferencias`
  ADD PRIMARY KEY (`PreferenciaID`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- Índices de tabela `usuarios_preferencias`
--
ALTER TABLE `usuarios_preferencias`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `PreferenciaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios_preferencias`
--
ALTER TABLE `usuarios_preferencias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
