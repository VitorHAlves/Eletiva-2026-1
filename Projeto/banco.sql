-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: projetophp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Motoristas`
--

DROP TABLE IF EXISTS `Motoristas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Motoristas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cnh` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Motoristas`
--

LOCK TABLES `Motoristas` WRITE;
/*!40000 ALTER TABLE `Motoristas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Motoristas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Passageiros`
--

DROP TABLE IF EXISTS `Passageiros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Passageiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Passageiros`
--

LOCK TABLES `Passageiros` WRITE;
/*!40000 ALTER TABLE `Passageiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `Passageiros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Veiculos`
--

DROP TABLE IF EXISTS `Veiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Placa` varchar(255) NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `Cor` varchar(255) NOT NULL,
  `Fabricante` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Veiculos`
--

LOCK TABLES `Veiculos` WRITE;
/*!40000 ALTER TABLE `Veiculos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Veiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Viagens`
--

DROP TABLE IF EXISTS `Viagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Viagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(255) NOT NULL,
  `valor` double NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `Veiculos_id` int(11) NOT NULL,
  `Passageiros_id` int(11) NOT NULL,
  `Motoristas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Viagens_Veiculos1_idx` (`Veiculos_id`),
  KEY `fk_Viagens_Passageiros1_idx` (`Passageiros_id`),
  KEY `fk_Viagens_Motoristas1_idx` (`Motoristas_id`),
  CONSTRAINT `fk_Viagens_Motoristas1` FOREIGN KEY (`Motoristas_id`) REFERENCES `Motoristas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Viagens_Passageiros1` FOREIGN KEY (`Passageiros_id`) REFERENCES `Passageiros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Viagens_Veiculos1` FOREIGN KEY (`Veiculos_id`) REFERENCES `Veiculos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Viagens`
--

LOCK TABLES `Viagens` WRITE;
/*!40000 ALTER TABLE `Viagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `Viagens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-15 10:58:51
