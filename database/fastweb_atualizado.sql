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
  `ofertas` int(11) NOT NULL,
  `endereco_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `endereco_fk` (`endereco_fk`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`endereco_fk`) REFERENCES `endereco` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (2,'Eduardo Henrique ','eduardo18delta@gmail.com','(96)99175-5811','Masculino','5edfafacd6719a7095fd86134a872335',1,4),(3,'gg','teste@email.com','099999999999','Masculino','d41d8cd98f00b204e9800998ecf8427e',1,3),(4,'bio','bio@email.com','099999999999','Masculino','e5ba7590156e333ef9aa4b9616a55921',1,NULL),(5,'admin','admin@email.com','(99)99999-9999','Masculino','123456',1,NULL),(6,'admin','admin@email.com','(99)99999-9999','Masculino','e10adc3949ba59abbe56e057f20f883e',1,NULL),(7,'admin','admin@email.com','(99)99999-9999','Masculino','e10adc3949ba59abbe56e057f20f883e',1,NULL);
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
  PRIMARY KEY (`id`),
  KEY `cliente_fk` (`cliente_fk`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`cliente_fk`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (2,'68909844','Avenida Oitava','2156','Marabaixo','Macapá','AP','1600303',2),(3,'68902000','Rua Manoel Eudóxio Pereira','2143','Beirol','Macapá','AP','1600303',2),(4,'68909000','Rua Vereador Julio Maria Pinto Pereira','2134','Jardim Felicidade','Macapá','AP','1600303',2),(5,'68904286','Avenida Cleveland Sá Cavalcante','2134','Novo Buritizal','Macapá','AP','1600303',2),(6,'68927239','Rua General Ubaldo Figueira','1234','Nova Brasília','Santana','AP','1600600',2);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
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
  `valor` int(11) NOT NULL,
  `pedido_efetuado` varchar(40) DEFAULT NULL,
  `pagamento_autorizado` varchar(40) DEFAULT NULL,
  `nf_emitida` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_fk` (`status_fk`),
  KEY `cliente_fk` (`cliente_fk`),
  KEY `produto_fk` (`endereco_fk`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`status_fk`) REFERENCES `status_pedido` (`id`),
  CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`endereco_fk`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `cod_barra` int(11) NOT NULL,
  `destaque` int(11) NOT NULL,
  `img_01` varchar(40) DEFAULT NULL,
  `img_02` varchar(40) DEFAULT NULL,
  `img_03` varchar(40) DEFAULT NULL,
  `img_04` varchar(40) DEFAULT NULL,
  `img_05` varchar(40) DEFAULT NULL,
  `img_06` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `categoria_fk` (`categoria_fk`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_fk`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Uva Melissa',20,1,'uryfghfhfhf','2020-02-20',67,'lkhklhkjhkj','Uva Melissa',3,1,8,0,1,'1ffa91bc17f93beee925777c20da0f64','6f9cf72e3e332c417b3fe3fb10fb5e39','155a14e3b1aceb85ce6e324e3c358a3f','0f32415230f3c6bb0d5c5a328444d3c9','098d9af845145dbd5007c47415aa0afe','a4a3308b1c4a628c3d224dde107fb325'),(2,'Maçã da Pell',15,1,'çoijkljkljjl','2020-02-20',6,'klkjll','jlhjkllkjkjkjl',46,3,8,0,1,'260913ff8c9f63ea0ced735b42fe07e8','767013a5052419652729448149994538','5a7dcd82019f17df734f904f48644714','cd31490ff4abaa80f4c9e7172307362b','0629776aa85a0dfb99f0eebe6991bf46','4339dd80a6deb61553515c888eea1d9a'),(3,'Trigo Benta',12,1,'lhklhkh','2020-02-20',56,'khkhjkhkjh','jhklhlkhlk',67,2,78,0,1,'b4247894f85421b174401a851318f7d9','7d5333184ff719f85f1e04cc04ef3322','2757e8c744ea5d47f4fe61753b98c85f','d1690b9dfddf42b1d9d1b20be8002794','ab6d246d7b7d8bb3900493bf89683fcd','a823019d97dbac2634f733fdd9179f88'),(4,'Bana float',54,1,'kjljkhkkjh','2020-02-20',6,'oihkjlhkj','khgkjhghjgjh',7,2,66,0,1,'48a6c2155a251acab10316b6471772f1','7b903845a23594461c53abae78dcd0fa','310b665f71eca5777b06505e059edd0c','2f321bd0b1e77e91adeeab719bee1eb1','353a065cab43d3ff4a2e50ec7f59f2ea','2650fd1cd50fe57b466441b33cb6e81d'),(5,'Frango',20,1,'ljkhkhhhjhjklkjhjkh','2020-02-20',20,'khjgjhhghgh','ihjkkhkjkk',1,7,10,0,1,'c2e49ef6df99e4915237a2e0d6df3434','c9fb566b1afd7d293379ccddff440276','4e1b366f5dd5e36650f0a2054cb2e66a','e99a34d7cbb35e10de2b8e622f028553','93f4d127b59a830aca3f76d59ea81f3b','2bd23da735e1a1aba56628b089b6a2d5'),(6,'Peru Cubano',20,1,'gjhhihkljhhh','2020-02-20',10,'fhfhfhfhh','hjgjhghjgjhgjghj',1,7,15,0,1,'fdb8af6e738f70a466937b7bb2fb1481','2acf51ffa9f17aa8a19925b4e12d77de','a245c758da4d51571bbf7a34cc09f74e','3fefab27084b347e3205784b3ad25b4a','1e8db1387a26d745a05d26b831fb5517','d70f298e560e01c0f29eaea3e1cfc10d');
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

-- Dump completed on 2019-05-11 17:04:05
