-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: fastweb
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Admin'),(2,'Caixa'),(3,'Auxiliar'),(9,'Recursos Humanos');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Alimentos'),(2,'Limpeza'),(3,'Higiene'),(4,'Bebidas'),(5,'Perecíveis'),(6,'Floricultura'),(7,'Produtos Orgânicos'),(8,'Bebidas não Alcoólicas'),(9,'Vitaminas'),(10,'Diversos'),(11,'Armarinho');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ofertas` int(11) DEFAULT NULL,
  `foto_perfil` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Rosivan Nascimento Santos','rosivan7qi@gmail.com','(96) 98809-5018','Masculino','',NULL,'cd6fc777c36a7186887afbe557d64d64'),(2,'eduardo nobre','eduardo@gmail.com','(96) 98809-5018','Masculino','e10adc3949ba59abbe56e057f20f883e',NULL,NULL),(3,'joao mendes','joao@email.com','(99) 99999-9999','Masculino','e10adc3949ba59abbe56e057f20f883e',NULL,'700716f083b1359bff83935ad1e4dcab'),(4,'maria santos','maria@email.com','(99) 99999-9999','Feminino','e10adc3949ba59abbe56e057f20f883e',NULL,'b6f5228ca06b39c73cce511972b323da');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(11) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `ibge` varchar(15) DEFAULT NULL,
  `cliente_fk` int(11) DEFAULT NULL,
  `principal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_fk` (`cliente_fk`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'68909844','...','2156','...','...','...','...',3,1);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_lista_compras`
--

DROP TABLE IF EXISTS `item_lista_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_lista_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_fk` int(11) NOT NULL,
  `lista_compras_fk` int(11) NOT NULL,
  `produtos_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_fk` (`cliente_fk`),
  KEY `lista_compras_fk` (`lista_compras_fk`),
  KEY `produtos_fk` (`produtos_fk`),
  CONSTRAINT `item_lista_compras_ibfk_1` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`),
  CONSTRAINT `item_lista_compras_ibfk_2` FOREIGN KEY (`lista_compras_fk`) REFERENCES `lista_compras` (`id`),
  CONSTRAINT `item_lista_compras_ibfk_3` FOREIGN KEY (`produtos_fk`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_lista_compras`
--

LOCK TABLES `item_lista_compras` WRITE;
/*!40000 ALTER TABLE `item_lista_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_lista_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_pedido`
--

DROP TABLE IF EXISTS `item_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_fk` int(11) NOT NULL,
  `produto_fk` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_fk` (`pedido_fk`),
  KEY `produto_fk` (`produto_fk`),
  CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`pedido_fk`) REFERENCES `pedido` (`id`),
  CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`produto_fk`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_pedido`
--

LOCK TABLES `item_pedido` WRITE;
/*!40000 ALTER TABLE `item_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_compras`
--

DROP TABLE IF EXISTS `lista_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  `cliente_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_fk` (`cliente_fk`),
  CONSTRAINT `lista_compras_ibfk_1` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_compras`
--

LOCK TABLES `lista_compras` WRITE;
/*!40000 ALTER TABLE `lista_compras` DISABLE KEYS */;
INSERT INTO `lista_compras` VALUES (1,'Churrasco',1);
/*!40000 ALTER TABLE `lista_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_fk` int(11) DEFAULT NULL,
  `endereco_fk` int(11) DEFAULT NULL,
  `status_fk` int(11) DEFAULT NULL,
  `valor` float NOT NULL,
  `pedido_efetuado` varchar(40) DEFAULT NULL,
  `pagamento_autorizado` varchar(40) DEFAULT NULL,
  `nf_emitida` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `endereco_fk` (`endereco_fk`),
  KEY `cliente_fk` (`cliente_fk`),
  KEY `status_fk` (`status_fk`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`status_fk`) REFERENCES `status_pedido` (`id`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`endereco_fk`) REFERENCES `endereco` (`id`),
  CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  PRIMARY KEY (`id_permissao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` VALUES (1,'Admin'),(2,'Gerente'),(3,'Auxiliar');
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
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
  `cod_barra` varchar(25) NOT NULL,
  `destaque` int(11) DEFAULT NULL,
  `img_01` varchar(40) DEFAULT NULL,
  `img_02` varchar(40) DEFAULT NULL,
  `img_03` varchar(40) DEFAULT NULL,
  `img_04` varchar(40) DEFAULT NULL,
  `img_05` varchar(40) DEFAULT NULL,
  `img_06` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `categoria_fk` (`categoria_fk`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_fk`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Frango Gelado',10,1,'xxxxxxxxxxxxxxxx','2020-02-20',100,'xxxxxxxxxxxxxxxxxxx','xxxxxxxxxxx',2,4,10,'000000000000',0,'662626888e75f7c7149c259fa6fd39ff','b62e2de8d3e007a9fe5de671efac8708','e271f191c66674ea52811cdefeb04d20','b8d08ef66b719b2a4bda877ba787997a','3fb41123c97ff0ab7a5830b810a0a10d','1b052bd0687a79eb4cdd46c1be5d4f7e');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pedido`
--

DROP TABLE IF EXISTS `status_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pedido`
--

LOCK TABLES `status_pedido` WRITE;
/*!40000 ALTER TABLE `status_pedido` DISABLE KEYS */;
INSERT INTO `status_pedido` VALUES (1,'Aguardando pagamento'),(2,'Pagamento em análise'),(3,'Pagamento aprovado');
/*!40000 ALTER TABLE `status_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `cargo_fk` int(11) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_fk` (`cargo_fk`),
  KEY `permissao` (`permissao`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cargo_fk`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`permissao`) REFERENCES `permissao` (`id_permissao`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'Eduardo  Henrique','edu@gmail.com','5edfafacd6719a7095fd86134a872335',1,1),(19,'Brenno','brenno@gmail.com','e10adc3949ba59abbe56e057f20f883e',9,3),(22,'Helber Chaves','helber@gmail.com','c33367701511b4f6020ec61ded352059',3,2),(23,NULL,'admin@email.com','admin123',NULL,NULL),(24,'Rosivan Santos','rosivan@email.com','e10adc3949ba59abbe56e057f20f883e',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-10 23:03:34
