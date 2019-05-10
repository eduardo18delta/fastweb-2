-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 10/05/2019 às 15:09
-- Versão do servidor: 5.7.26-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.33-0ubuntu0.16.04.4

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
(2, 'Eduardo Henrique ', 'eduardo18delta@gmail.com', '(96)99175-5811', 'Masculino', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'gg', 'teste@email.com', '099999999999', 'Masculino', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(4, 'bio', 'bio@email.com', '099999999999', 'Masculino', 'e5ba7590156e333ef9aa4b9616a55921', 1),
(7, 'admin', 'admin@email.com', '(99)99999-9999', 'Masculino', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `ibge` varchar(15) DEFAULT NULL,
  `cliente_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `ibge`, `cliente_fk`) VALUES
(2, '68909844', 'Avenida Oitava', '2156', 'Marabaixo', 'Macapá', 'AP', '1600303', 2),
(3, '68925192', 'Rua Capitão Euclides Rodrigues', '2675', 'Central', 'Santana', 'AP', '1600600', 2),
(4, '68927254', 'Travessa Miguel de Bulhões', '79', 'Nova Brasília', 'Santana', 'AP', '1600600', 2),
(5, '68927239', 'Rua General Ubaldo Figueira', '177', 'Nova Brasília', 'Santana', 'AP', '1600600', 2),
(6, '68909034', 'Avenida Joaquim Silva do Amaral', '244', 'Jardim Felicidade', 'Macapá', 'AP', '1600303', 2),
(7, '68927254', 'Travessa Miguel de Bulhões', '12', 'Nova Brasília', 'Santana', 'AP', '1600600', 2),
(8, '68909895', 'Avenida Quarta', '123', 'Marabaixo', 'Macapá', 'AP', '1600303', 2);

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
  `descricao` varchar(100) NOT NULL,
  `peso` float NOT NULL,
  `medida` int(11) NOT NULL,
  `desconto` int(11) NOT NULL,
  `cod_barra` int(11) NOT NULL,
  `destaque` int(11) DEFAULT NULL,
  `img_01` varchar(40) DEFAULT NULL,
  `img_02` varchar(40) DEFAULT NULL,
  `img_03` varchar(40) DEFAULT NULL,
  `img_04` varchar(40) DEFAULT NULL,
  `img_05` varchar(40) DEFAULT NULL,
  `img_06` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `valor`, `categoria_fk`, `fornecedor`, `validade`, `quantidade`, `marca`, `descricao`, `peso`, `medida`, `desconto`, `cod_barra`, `destaque`, `img_01`, `img_02`, `img_03`, `img_04`, `img_05`, `img_06`) VALUES
(1, 'Coca COla', 10, 1, 'dsdsad', '2021-01-01', 1, 'dasdasd', 'dnkasjdjkahs', 1, 4, 12, 123123, 1, '40b924ff028e326e92e4485acad37e36', 'fed66fab482bdb49123c3e0eff968e85', '8f3e1bc878df65135bb54caa5f95b3c4', '67747ff343a76bf67da1c3557d85d8a8', '3bd36d2860ac7aecb72a59efc05b6fa9', 'f9fc3c0d525f5252226c963a03dfa90e');

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
(9, 'Eduardo  Henrique', 'edu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(19, 'Brenno', 'brenno@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 9, 3),
(22, 'Helber Chaves', 'helber@gmail.com', 'c33367701511b4f6020ec61ded352059', 3, 2),
(24, 'Rosivan Santos', 'rosivan@email.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

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
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_fk` (`cliente_fk`);

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
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`);

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
