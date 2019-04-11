-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 11/04/2019 às 08:24
-- Versão do servidor: 5.7.25-0ubuntu0.16.04.2
-- Versão do PHP: 7.0.33-0ubuntu0.16.04.3

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
(2, 'Eduardo Henrique ', 'eduardo18delta@gmail.com', '(96)99175-5811', 'Masculino', '5edfafacd6719a7095fd86134a872335', 1),
(3, 'gg', 'teste@email.com', '099999999999', 'Masculino', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(4, 'bio', 'bio@email.com', '099999999999', 'Masculino', 'e5ba7590156e333ef9aa4b9616a55921', 1),
(5, 'admin', 'admin@email.com', '(99)99999-9999', 'Masculino', '123456', 1),
(6, 'admin', 'admin@email.com', '(99)99999-9999', 'Masculino', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'admin', 'admin@email.com', '(99)99999-9999', 'Masculino', 'e10adc3949ba59abbe56e057f20f883e', 1);

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
  `url_imagem` varchar(100) DEFAULT NULL,
  `img_01` varchar(40) DEFAULT NULL,
  `img_02` varchar(40) DEFAULT NULL,
  `img_03` varchar(40) DEFAULT NULL,
  `img_04` varchar(40) DEFAULT NULL,
  `img_05` varchar(40) DEFAULT NULL,
  `img_06` varchar(40) DEFAULT NULL,
  `desconto` float NOT NULL,
  `destaque` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `valor`, `categoria_fk`, `fornecedor`, `validade`, `quantidade`, `marca`, `url_imagem`, `img_01`, `img_02`, `img_03`, `img_04`, `img_05`, `img_06`, `desconto`, `destaque`, `descricao`) VALUES
(4, 'Leite Ninho ', 12, 1, 'Ninho Leites', '2021-01-01', 100, 'Leite Ninho', NULL, '48cc7850f930cfc44b6e72fa29629dc0', 'bf3c5de4e59ba25a5c2b869291303529', '1eedc55f9b37551e7ee893811383947a', 'c8704498314d5e4b7ab069645bb020be', '92f501d6b5c2c8e884228ba0f6611d45', '8bf0f45fef9a678511bd9820284dfc94', 0, 0, ''),
(6, 'Arroz Camil ', 5, 1, 'Timbiras', '2021-01-01', 200, 'Arroz Camil', NULL, '63201190298ef4ad833bcabc84f3244f', '2a73632c89190d7d1ab26b5eb390dfb7', '7d5b41088cc7c366fc9b464dbacf31a6', '325dafaf24f5c1829a6bb91812201b16', '35405c93e369567af7c4f3d63d666c56', 'bfd4da80ecc0c5ca0850c8a7f57e4ab3', 0, 0, ''),
(7, 'Macarrão ', 3, 1, 'Timbiras', '2022-01-01', 100, 'Macarrão Petybon', NULL, 'c7f3a59a48641d7afa5ea71a9772e2f4', '42711738d36fabc4f138882c35a6bedf', 'f5f5f7f843aee41ca8e5d967db7d84b9', 'd85adb5ec6c6bc565da96f1f1fd41442', 'e5056659096af01702280e1bd035bc14', '1946c5938a8b2e6d7f60d0a59d779908', 0, 0, ''),
(8, 'Feijão Camil', 6, 1, 'Timbiras', '2022-01-01', 100, 'Feijão Camil ', NULL, '3785851f33ca21f239c602d0c5d1dd63', 'fd988c0a36c0289c8eae626af7c1c876', 'aaa1d14841512e19a2d0e9571c039b06', '07bc0df4c35e718c7660e43a8caa5a0d', '73966258f1ce837ead261fafc64123d8', 'b5fc78bd31fbec740785ab80a2976e4a', 0, 0, ''),
(12, 'Nescau 2.0', 9, 1, 'Nestle ', '2021-01-01', 400, 'Nestle', NULL, '5cf0f038f4422560cd98a72865b2329b', 'e641c259421ce44e959eedcb39c58b56', '1cef0dcc6056c1b0ebd5365a81c25ae5', '8749cf4340bda70c0dc2462a18ac9efd', '49de437000a7ecbf1b43c8767d12a4d2', '16a1b0ac8e7296200743089daa79e5c4', 0, 0, ''),
(13, 'Frango ', 22.5, 1, 'Aurora', '2019-01-01', 20, 'Aurora', NULL, 'b4477828a36f04974bac7647c32efd23', 'f0fe4c61174b8784f4132848653f73ca', 'adbb6430cb0d3588dfaff4d8b816feb0', 'ce505684de041ca1c40101f08a285b41', '313c758f55fad7c258404f4a1fc6173e', '3d6db46d2f34a8e7a6738189f12f312e', 0, 0, ''),
(14, 'Shampoo', 15, 5, 'Timbiras', '1998-01-01', 100, 'Timbiras', NULL, '6b760a2f3b646361457efc282177c884', '504e033148cb2d97f1f7d8febb6ac2f3', '3659dcf397d7c0d5675fc851f9ac7cdb', 'aa765f9cc414e2610e81212e6eb4ee6c', 'b33d879c62facd5767553053b15c3df9', 'f8bc135eb7690eed80f87382c975e31b', 0, 0, ''),
(17, 'Coca 3 Litros', 10, 8, 'Grupo Simões ', '1998-01-01', 100, 'Coca Cola', NULL, 'd5c1955c84cff989c1dcdfcce10210b9', '915dab0c6c69d62ad41d67d643cae0d7', 'f97a816b65ad3f620b56c0381c77de33', '663cac4f61668594e2e80db1ecff9f2a', '87e5c9260f90af8e37d77759a9acdb28', 'b1c8a004c30fd7f9bac648504dc42e5b', 0, 0, ''),
(18, 'Sprite 2 Litros', 9, 8, 'Grupo Simões', '2021-01-01', 100, 'Sprite', NULL, 'efe4a91b573ae5b23e78d017d915f11e', '577192fcad08cd256f701c3b5566479f', '3e6798bbe4c46727f880da76eaf26f82', '97c62a717c49a2fb1ee00bf3c286290e', '7e4b7c87f18cecfa7ece5c7850814bef', '7cc6cd55b82ab66e71e840609e422386', 0, 0, ''),
(19, 'Pepsi 1 Litro', 4, 8, 'Grupo Simões', '2021-01-01', 100, 'Pepsi Cola', NULL, 'f8bdd33684995c7745673d80ebad3344', '58d17953aa8628caa1de462b57727152', '7aea90de1c2a1134cd2df80b83662058', 'a626aa08a539e7b4217564ad128f1b3b', 'b57ba34950f1e13d1b4776f6797c78a8', '42bccdb17eac5f809bf8dd42cde5d9c4', 0, 0, ''),
(20, 'Fanta Uva ', 9, 8, 'Grupo Simões ', '2021-01-01', 200, 'Fanta Uva', NULL, 'ac1bcbaaf50f00fa26c326d09b1649aa', '593da924cfadeaa4bf333dfc3ff92363', '833f99fd6b975acccb571c95d07ce1ee', '7da31bed56bb7196965de4fd57f5ee62', 'ee94686aef781e8d1d99e9e1b64e9f7c', '70f311d5be83f42ecf024e9c15f81fa6', 0, 0, ''),
(21, 'Bebida quente', 1, 8, 'djashdkjash ', '2021-01-01', 1, 'kjasdjkash', NULL, '5e040e1a72432e8cd1f5e71c4a21952b', '889f9fbfd6d2d8eef376f066a0bb5148', '83ed3ecd38eee3caa6f08e36a9957a6d', 'b2b745af514aeee1ac9a6d460ab991d3', '3dfd46839f8a8ecabb17ae5b35e56ba1', 'dbfe066325d3e95cf05669c53c044d38', 0, 0, ''),
(22, 'Teste ', 21.31, 1, 'teste teste ', '1998-01-01', 100, 'dhsdsfdfd', NULL, 'f903deccca0bef7c4bc28b48e36e2d08', '10ea5a2bb2ee8b8303b9e3235f49ea1e', '1b7c9edc4ea327232f03c2c31db37ed7', 'b189d34859732ea29a7b023d6e354c5f', '4e65434f0711d177776f9c7977146f58', 'd3ada958d6ac66e224db18bd740031d5', 0, 0, ''),
(23, 'gjhgjh', 1.5, 8, 'hghjgjhgjhg', '1998-01-01', 1, 'jhhjghjgjhg', NULL, 'dde49d0826d07ed964f76ea2a58ef0b1', '84b9138d4661a667ca6976c50e290f48', '97e6ba558f2c4a1e59adce9eaa6526cd', '020d8b890b5afb846887a17a79575f46', 'e4f3d0fe825081497cbe23526d24097f', '8212e3300952aa60d692eee2083a9fb2', 0, 0, '');

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
(9, 'Eduardo Henrique ', 'eduardo18delta@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
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
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
