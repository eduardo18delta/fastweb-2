-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 13/05/2019 às 15:50
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
  `ofertas` int(11) DEFAULT NULL,
  `endereco_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `sexo`, `senha`, `ofertas`, `endereco_fk`) VALUES
(2, 'Eduardo Henrique ', 'eduardo18delta@gmail.com', '(96)99175-5811', 'Masculino', '5edfafacd6719a7095fd86134a872335', 1, 4),
(21, 'Gisele Barbosa', 'gisele@gmail.com', '765443', 'Feminino', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

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
(3, '68902000', 'Rua Manoel Eudóxio Pereira', '2143', 'Beirol', 'Macapá', 'AP', '1600303', 2),
(4, '68909000', 'Rua Vereador Julio Maria Pinto Pereira', '2134', 'Jardim Felicidade', 'Macapá', 'AP', '1600303', 2),
(5, '68904286', 'Avenida Cleveland Sá Cavalcante', '2134', 'Novo Buritizal', 'Macapá', 'AP', '1600303', 2),
(6, '68927239', 'Rua General Ubaldo Figueira', '1234', 'Nova Brasília', 'Santana', 'AP', '1600600', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `id` int(11) NOT NULL,
  `pedido_fk` int(11) NOT NULL,
  `produto_fk` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_fk` int(11) DEFAULT NULL,
  `endereco_fk` int(11) DEFAULT NULL,
  `status_fk` int(11) DEFAULT NULL,
  `valor` float NOT NULL,
  `pedido_efetuado` varchar(40) DEFAULT NULL,
  `pagamento_autorizado` varchar(40) DEFAULT NULL,
  `nf_emitida` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `destaque` int(11) NOT NULL,
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
(1, 'Uva Melissa', 20, 1, 'uryfghfhfhf', '2020-02-20', 67, 'lkhklhkjhkj', 'Uva Melissa', 3, 1, 8, 0, 1, '1ffa91bc17f93beee925777c20da0f64', '6f9cf72e3e332c417b3fe3fb10fb5e39', '155a14e3b1aceb85ce6e324e3c358a3f', '0f32415230f3c6bb0d5c5a328444d3c9', '098d9af845145dbd5007c47415aa0afe', 'a4a3308b1c4a628c3d224dde107fb325'),
(2, 'Maçã da Pell', 15, 1, 'çoijkljkljjl', '2020-02-20', 6, 'klkjll', 'jlhjkllkjkjkjl', 46, 3, 8, 0, 1, '260913ff8c9f63ea0ced735b42fe07e8', '767013a5052419652729448149994538', '5a7dcd82019f17df734f904f48644714', 'cd31490ff4abaa80f4c9e7172307362b', '0629776aa85a0dfb99f0eebe6991bf46', '4339dd80a6deb61553515c888eea1d9a'),
(3, 'Trigo Benta', 12, 1, 'lhklhkh', '2020-02-20', 56, 'khkhjkhkjh', 'jhklhlkhlk', 67, 2, 78, 0, 1, 'b4247894f85421b174401a851318f7d9', '7d5333184ff719f85f1e04cc04ef3322', '2757e8c744ea5d47f4fe61753b98c85f', 'd1690b9dfddf42b1d9d1b20be8002794', 'ab6d246d7b7d8bb3900493bf89683fcd', 'a823019d97dbac2634f733fdd9179f88'),
(4, 'Bana float', 54, 1, 'kjljkhkkjh', '2020-02-20', 6, 'oihkjlhkj', 'khgkjhghjgjh', 7, 2, 66, 0, 1, '48a6c2155a251acab10316b6471772f1', '7b903845a23594461c53abae78dcd0fa', '310b665f71eca5777b06505e059edd0c', '2f321bd0b1e77e91adeeab719bee1eb1', '353a065cab43d3ff4a2e50ec7f59f2ea', '2650fd1cd50fe57b466441b33cb6e81d'),
(5, 'Frango', 20, 1, 'ljkhkhhhjhjklkjhjkh', '2020-02-20', 20, 'khjgjhhghgh', 'ihjkkhkjkk', 1, 7, 10, 0, 1, 'c2e49ef6df99e4915237a2e0d6df3434', 'c9fb566b1afd7d293379ccddff440276', '4e1b366f5dd5e36650f0a2054cb2e66a', 'e99a34d7cbb35e10de2b8e622f028553', '93f4d127b59a830aca3f76d59ea81f3b', '2bd23da735e1a1aba56628b089b6a2d5'),
(6, 'Peru Cubano', 20, 1, 'gjhhihkljhhh', '2020-02-20', 10, 'fhfhfhfhh', 'hjgjhghjgjhgjghj', 1, 7, 15, 0, 1, 'fdb8af6e738f70a466937b7bb2fb1481', '2acf51ffa9f17aa8a19925b4e12d77de', 'a245c758da4d51571bbf7a34cc09f74e', '3fefab27084b347e3205784b3ad25b4a', '1e8db1387a26d745a05d26b831fb5517', 'd70f298e560e01c0f29eaea3e1cfc10d');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `id` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `status`) VALUES
(1, 'Aguardando pagamento'),
(2, 'Pagamento em análise'),
(3, 'Pagamento aprovado');

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
(22, 'Helber Chaves', 'helber@gmail.com', 'c33367701511b4f6020ec61ded352059', 3, 2),
(23, NULL, 'admin@email.com', 'admin123', NULL, NULL),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `endereco_fk` (`endereco_fk`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_fk` (`cliente_fk`);

--
-- Índices de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_fk` (`pedido_fk`),
  ADD KEY `produto_fk` (`produto_fk`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_fk` (`status_fk`),
  ADD KEY `cliente_fk` (`cliente_fk`),
  ADD KEY `produto_fk` (`endereco_fk`);

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
-- Índices de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`endereco_fk`) REFERENCES `endereco` (`id`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`pedido_fk`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`produto_fk`) REFERENCES `produtos` (`id_produto`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`status_fk`) REFERENCES `status_pedido` (`id`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`endereco_fk`) REFERENCES `produtos` (`id_produto`);

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
