-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/10/2025 às 12:29
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
  `Nome` varchar(50) NOT NULL,
  `Sobrenome` varchar(150) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` varchar(16) NOT NULL,
  `CEP` int(8) NOT NULL,
  `Endereco` varchar(150) NOT NULL,
  `Numero` int(5) NOT NULL,
  `Complemento` varchar(100) NOT NULL,
  `Imagem` varchar(255) NOT NULL,
  `Cidade` varchar(150) NOT NULL,
  `Estado` varchar(2) NOT NULL,
  `Distancia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nome`, `Sobrenome`, `Usuario`, `Email`, `Senha`, `CEP`, `Endereco`, `Numero`, `Complemento`, `Imagem`, `Cidade`, `Estado`, `Distancia`) VALUES
(1, 'nome', 'sobrenome', 'usuario', 'email@oi.com.br', '123456', 1234567890, 'rua legal', 123, 'bloco v', '', 'porto', 'rs', 0),
(2, 'Eduarda ', 'Ordahy', 'dudaordahy', 'dudasciortino@gmail.com', 'dudinha2532', 90660280, 'Rua Humberto de Campos', 1196, 'nao', '', 'Porto Alegre', 'RS', 0),
(4, 'Valentina', 'Farias', 'vava', 'valenborbafarias@gmail.com', 'vbf', 80500600, 'Chico Mendes', 104, 'nao', '', 'Dois Irmãos', 'rs', 0),
(5, 'Jeferson', 'Silva', 'JSilva', 'jsilva@gmail', '0000', 90000000, 'Rua Humberto de Campos', 18, 'casa', '', 'POA', 'RS', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
