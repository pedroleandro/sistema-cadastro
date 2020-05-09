-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: localhost    Database: gecad-dynamic
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `imagem_dir` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descricao` text,
  `duracao` decimal(4,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (6,'Criando Websites com PHP Slim Framework 7.4','/public/images/cursos/logo-smal.png','Aprenda a construir um website utilizando o Micro Slim FrameWork PHP',8.0),(7,'Flutter e Dart','/public/images/cursos/logo-smal.png','Um Guia Completo do Flutter SDK & Flutter Framework para a construção de app nativas para iOS e Android										',10.0),(8,'Spring Boot','/public/images/cursos/logo-smal.png','Projeto full stack completo! Java Spring Boot no back end e Ionic no front end. Do design UML ao Heroku e Play Store!						',10.0),(10,'Desenvolvimento Web Moderno com JavaScript Completo 2020','/public/images/cursos/logo-smal.png','Domine Web - 14 Cursos + Projetos - Javascript Angular React Vue Node HTML CSS jQuery Bootstrap Webpack Gulp MySQL Mais',20.0),(11,'Curso Vue JS 2 - O Guia Completo (incl. Vue Router & Vuex)','/public/images/cursos/logo-smal.png','VueJS é um framework Javascript fantástico p construir aplicações Frontend! Vue.js mistura o melhor do Angular + React!',26.0);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professores` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `imagem_dir` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (3,'Pedro Leandro','/public/images/professores/SquareQuick_20205422213388.jpg','Bacharelado em Ciência da Computação pelo IFMA Campus Caxias'),(4,'Airton A. Sousa','/public/images/professores/SquareQuick_202054222746447.jpg','Bacharelado em Ciência da Computação pelo IFMA Campus Caxias'),(5,'Juan Carlos','/public/images/professores/SquareQuick_202054222145273.jpg','Bacharelado em Ciência da Computação pelo IFMA Campus Caxias'),(6,'Gerson James','/public/images/professores/SquareQuick_202054222857858.jpg','Bacharelado em Ciência da Computação pelo IFMA Campus Caxias'),(8,'Luan Silva','/public/images/professores/SquareQuick_202054222725107.jpg','Bacharelado em Ciência da Computação pelo IFMA Campus Caxias');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'pedroleandro','$2y$10$90nvvYHTGnvGLNvMerjhTOZspBmiT2.d88rbwAxcBzcv6M01bg0wG','Pedro Leandro Gomes da Silva','pedro.leandrog@gmail.com'),(3,'airtonsousa','$2y$10$EuYw065CXuccKT/6usk2/.tESyJrOUD7edicHuHoYMWVCAexdQbXi','Airton Araujo Sousa','airton.sousa@gmail.com'),(7,'admin','$2y$10$7uwxy1F7iP.bQGlAzd5w5u4nGIvhou4sRGFFtcg/3rwvCqkT7FD1u','Administrador','admin@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gecad-dynamic'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-08 22:57:33
