-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 12/12/2018 às 19:53
-- Versão do servidor: 5.7.24-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.32-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fastweb-2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `descricao`) VALUES
(1, 'Admin'),
(2, 'Caixa'),
(3, 'Auxiliar'),
(9, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao`) VALUES
(1, 'Alimentos'),
(2, 'Limpeza'),
(3, 'Higiene'),
(4, 'Bebidas'),
(5, 'Perecíveis'),
(6, 'Floricultura'),
(7, 'Produtos Orgânicos'),
(8, 'Bebidas não Alcoólicas'),
(9, 'Vitaminas'),
(10, 'Diversos'),
(11, 'Armarinho');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ofertas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `sexo`, `senha`, `ofertas`) VALUES
(2, 'Eduardo Henrique ', 'eduardo18delta@gmail.com', '(96)99175-5811', 'Masculino', '5edfafacd6719a7095fd86134a872335', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissao`
--

CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `permissao`
--

INSERT INTO `permissao` (`id_permissao`, `descricao`) VALUES
(1, 'Admin'),
(2, 'Gerente'),
(3, 'Auxiliar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `categoria_fk` int(11) NOT NULL,
  `fornecedor` varchar(100) NOT NULL,
  `validade` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `url_imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `valor`, `categoria_fk`, `fornecedor`, `validade`, `quantidade`, `marca`, `url_imagem`) VALUES
(3, 'Arroz ', 5, 1, 'Timbiras', '2021-01-01', 200, 'Timbiras', NULL),
(4, 'Feijão ', 5, 7, 'Timbiras ', '2022-01-01', 1000, 'Timbiras', NULL),
(5, 'Coca-Cola 2 Litros', 8, 4, 'Grupo Simão ', '2024-05-02', 2000, 'Coca-Cola', NULL),
(6, 'Escova de dentes', 5, 10, 'Diversos', '2023-01-01', 100, 'Sorriso', NULL),
(7, 'Chocolate - Barra grande', 10, 1, 'Nestle', '2023-12-02', 60, 'Nestle', NULL),
(8, 'Açucar - 1 kg', 5, 1, 'Timbiras', '2022-01-01', 200, 'Açucar Milla', NULL),
(9, 'Conserva - Lata', 5, 1, 'Diversos', '2022-01-01', 500, 'Diversas', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `cargo_fk` int(11) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `cargo_fk`, `permissao`) VALUES
(9, 'Eduardo  Henrique', 'edu@gmail.com', '5edfafacd6719a7095fd86134a872335', 1, 1),
(19, 'Brenno', 'brenno@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 9, 3),
(22, 'Helber Chaves', 'helber@gmail.com', 'c33367701511b4f6020ec61ded352059', 3, 2);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `categoria_fk` (`categoria_fk`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo_fk` (`cargo_fk`),
  ADD KEY `permissao` (`permissao`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_fk`) REFERENCES `categoria` (`id_categoria`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cargo_fk`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`permissao`) REFERENCES `permissao` (`id_permissao`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
