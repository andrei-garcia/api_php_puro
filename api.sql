-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Set-2023 às 05:36
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `api`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `api_key`
--

CREATE TABLE `api_key` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `chave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `api_key`
--

INSERT INTO `api_key` (`id`, `usuario`, `senha`, `chave`) VALUES
(6, 'testes', '123456', '$]BesiV1.uvp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha`
--

CREATE TABLE `campanha` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) NOT NULL,
  `orcamento` decimal(20,2) DEFAULT NULL,
  `publico` varchar(200) DEFAULT NULL,
  `dt_inicio` datetime DEFAULT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `campanha`
--

INSERT INTO `campanha` (`id`, `nome`, `orcamento`, `publico`, `dt_inicio`, `dt_fim`, `status`) VALUES
(6, 'teste via api', '444.44', 'geral', '2022-12-15 00:00:00', '2023-01-15 20:00:00', 'em andamento'),
(7, 'teste 2 via api', '444.44', 'geral', '2022-12-15 00:00:00', '2023-01-15 20:00:00', 'em andamento'),
(8, 'teste 2 via api', '444.44', 'geral', '2022-12-15 00:00:00', '2023-01-15 20:00:00', 'em andamento'),
(9, 'teste 2 via api', '444.44', 'geral', '2022-12-15 00:00:00', '2023-01-15 20:00:00', 'em andamento'),
(10, 'teste 2 via api', '444.44', 'geral', '2022-12-15 00:00:00', '2023-01-15 20:00:00', 'em andamento'),
(11, 'teste 2 via api ggg', '444.44', 'geral', '2022-12-15 00:00:00', '2023-01-15 20:00:00', 'em andamento'),
(12, 'teste via api', '255.55', 'geral', NULL, NULL, ''),
(13, 'teste via api', '255.55', 'geral', NULL, NULL, 'em andamento'),
(14, 'teste via api', '255.55', 'geral', '2023-08-31 01:00:00', '0000-00-00 00:00:00', 'em andamento'),
(15, 'teste via api', '255.55', 'geral', '2023-08-31 01:00:00', '2023-09-30 01:00:00', 'em andamento'),
(16, 'teste via api', '255.55', 'geral', '2023-08-31 01:00:00', '2023-09-30 01:00:00', 'em andamento');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `api_key`
--
ALTER TABLE `api_key`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `api_key`
--
ALTER TABLE `api_key`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `campanha`
--
ALTER TABLE `campanha`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
