-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2025 às 12:23
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
-- Banco de dados: `vakinha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `login` varchar(5000) NOT NULL,
  `password` varchar(5000) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`) VALUES
(1, 'Bruno', 'Bruno@gmail.com', '$2y$10$dkbYKvKly92xLJTMMRz6GerZihYqJDL7icgazfCLZj2gqArWVs.Am', 'user'),
(2, 'Bruno', 'Bruno@gmail.com1', '$2y$10$Ic.WJ02aPvzOUk31uXT8IuJLH6EKOyXn7FtazUwnMU0ix6cOzJBrS', 'user');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaquinha`
--

CREATE TABLE `vaquinha` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `descp` text NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `doado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vaquinha`
--

INSERT INTO `vaquinha` (`id`, `title`, `link`, `descp`, `value`, `doado`) VALUES
(1, 'Doar sangue', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJCg6GlaCcu-BcNLDZ6P5xv388E7zqAxzmYg&s', 'Ajuda o cara que vai morrer', 99999999.99, 1502.00),
(2, 'Novos programadores para o lol', 'https://img.odcdn.com.br/wp-content/uploads/2024/04/imagem_2024-04-30_172325065.png', 'REFAZER O TIME INTEIRO', 5.00, 756.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vaquinha`
--
ALTER TABLE `vaquinha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vaquinha`
--
ALTER TABLE `vaquinha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
