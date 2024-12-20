-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: uqi_academy_test
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(10) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `year` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_batch` (`id_student`),
  CONSTRAINT `fk_student_batch` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch`
--

LOCK TABLES `batch` WRITE;
/*!40000 ALTER TABLE `batch` DISABLE KEYS */;
INSERT INTO `batch` VALUES (1,'2401-001','2024-11-23 11:03:22',2024,1),(2,'2401-002','2024-11-25 04:49:29',2024,1),(3,'2401-003','2024-11-25 04:49:29',2024,1),(4,'2401-004','2024-11-25 04:49:29',2024,1),(5,'2401-005','2024-11-25 04:49:29',2024,1),(6,'2401-006','2024-11-25 04:49:29',2024,1),(7,'2401-007','2024-11-25 04:49:29',2024,1),(8,'2401-008','2024-11-25 04:49:29',2024,1),(9,'2401-009','2024-11-25 04:49:29',2024,1),(10,'2401-010','2024-11-25 04:49:29',2024,1),(11,'2401-011','2024-11-25 04:49:30',2024,1),(12,'2401-012','2024-11-25 04:49:30',2024,1),(13,'2401-013','2024-11-25 04:49:30',2024,1),(14,'2401-014','2024-11-25 04:49:30',2024,1),(15,'2401-015','2024-11-25 04:49:30',2024,1),(16,'2401-016','2024-11-25 04:49:30',2024,1),(17,'2401-017','2024-12-08 16:43:55',2024,1),(18,'2401-018','2024-12-08 16:54:18',2024,1);
/*!40000 ALTER TABLE `batch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `school` varchar(255) NOT NULL,
  `entry_year` int(11) NOT NULL,
  `graduate_year` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_educations` (`id_student`),
  CONSTRAINT `fk_student_educations` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educations`
--

LOCK TABLES `educations` WRITE;
/*!40000 ALTER TABLE `educations` DISABLE KEYS */;
/*!40000 ALTER TABLE `educations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(10) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` text NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_experiences` (`id_student`),
  CONSTRAINT `fk_student_experiences` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences`
--

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(10) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_student_languages` (`id_student`),
  CONSTRAINT `fk_student_languages` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portofolios`
--

DROP TABLE IF EXISTS `portofolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portofolios` (
  `id` varchar(255) NOT NULL,
  `id_student` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `portofolio_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_portofolio` (`id_student`),
  CONSTRAINT `fk_student_portofolio` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portofolios`
--

LOCK TABLES `portofolios` WRITE;
/*!40000 ALTER TABLE `portofolios` DISABLE KEYS */;
/*!40000 ALTER TABLE `portofolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `id_student` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_session` (`id_student`),
  CONSTRAINT `fk_student_session` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('674ad0fc7a146','2401-001'),('6755d1cb38b82','2401-001');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(10) NOT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_student_skills` (`id_student`),
  CONSTRAINT `fk_student_skills` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` varchar(10) NOT NULL,
  `platform` varchar(20) NOT NULL,
  `url` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_social_media` (`id_student`),
  CONSTRAINT `fk_student_social_media` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_media`
--

LOCK TABLES `social_media` WRITE;
/*!40000 ALTER TABLE `social_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `temp_password` varchar(10) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `school` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('2401-001','$2y$10$MlVGw/P7GJgdT9WCJU5aSer0nVJXjMRdXvd.Cu.zYLoPuM/n7uboO','','blank.jpg','Admin','3d','mail','/public/profile/2401-001','bio','admin','admin','admin','enabled'),('2401-002','$2y$10$sYrvW4jjmUmfl733stZckuc1sYdfoSljEXWlNxImAXN5x2tbLuihu','lkBSNVYz8T','Ainun.jpg','Ainun Salsabila','(edit your specialist)','(edit your email)','/public/profile/2401-002','(edit your bio)','085600894635','Kawunganten RT 07 RW 03','SMK Negeri 1 Kawunganten','enabled'),('2401-003','$2y$10$c/uw4wV4dM9/Hu5c/ktkd.BYCN0Ogua7xN4emNJpXqAAiKebAG8SG','IBOuLnCeEg','Ghani.jpg','Akramuti Ghaniarto',NULL,NULL,'/public/profile/2401-003',NULL,'087794710749','RT/02 RW/03, Dukuh. Krajan, Desa. Banioro, Kec. Karangsambung, Kab. Kebumen','SMK Negeri 1 Kebumen','enabled'),('2401-004','$2y$10$lbBnZmz.w4V92j5CO67Buewd4ir8CLoY21Z1ucAixg606tc6lkx8i','QfsMpKkMOD','Dheni.jpg','Dheni Setiawan',NULL,NULL,'/public/profile/2401-004',NULL,'085641190307','Bojong, kramasari rt 04 rw 04','SMK Negeri 1 Kawunganten','enabled'),('2401-005','$2y$10$2G0acgrhRI.g47HEVcwO2eKbumvLqKdxK7QPPeYsnfRv12HuyrzZy','ErcNPTuRrp','Fani.jpg','Fani Fadila',NULL,NULL,'/public/profile/2401-005',NULL,'088216458968','dusun Sidamulya RT 01/03, desa Binangun, kecamatan bantarsari, kabupaten Cilacap','SMK Negeri 1 Kawunganten','enabled'),('2401-006','$2y$10$Uajg9MBuZvoH2ZJpB62tS.1OsB9F9TXLl5AaGR3yzaPf.gBG67b.m','WEdudXeIiG','Febri.jpg','Febriyanti',NULL,NULL,'/public/profile/2401-006',NULL,'088221887265','KARANGREJA RT02 RW08, KEC.KAWUNGANTEN, KAB.CILACAP','SMK Negeri 1 Kawunganten','enabled'),('2401-007','$2y$10$uwYZsrvsOefEloe0OFOhGOxPQg8xPBUhaEVNgKysFhaEXeIXCX9cG','CBezqXth6L','Rani.jpg','KHIRANIA ADINDA KENCANA PUTRI',NULL,NULL,'/public/profile/2401-007',NULL,'083145812351','Desa Sidaurip Dusun Bojong Djander Rt 04 / Rw 03','SMK Negeri 1 Kawunganten','enabled'),('2401-008','$2y$10$7QoOQfWnNN9qKphvX8IMLedUiBceplCpOODzf9gta2wAUxufhgo5C','d2du6FON1Q','Bintang.jpg','MOHAMAD BINTANG RAMADANIATUN',NULL,NULL,'/public/profile/2401-008',NULL,'081567670616','DUSUN MULYADADI,RT07/RW04','SMK Negeri 1 Kawunganten','enabled'),('2401-009','$2y$10$a.Omh2yVaW5LMynv4EkWy.eW1aoBQoBbxJ2KfVCpSxnWUx82W8CtC','qCRVZPuUJq','Haykal.jpg','Mohammad Haykal Fahrezha',NULL,NULL,'/public/profile/2401-009',NULL,'089603633930','Ds. Munggu RT01/05 Kec. Petanahan','SMK Negeri 1 Kebumen','enabled'),('2401-010','$2y$10$AAn4swm68Y.FolMYNArAe.eXm8kOfb8q6FTRV98gBkRTKyUtE5qCC','2IL3DGXZEg','Sidik.jpg','Muhamad sidik kurniawan',NULL,NULL,'/public/profile/2401-010',NULL,'0882005720963','desa rawajaya rt 2 rw 2 kecamatan Bantarsari kabupaten cilacap','SMK Negeri 1 Kawunganten','enabled'),('2401-011','$2y$10$XNUNKFQjXjrar.LFID2lleGAggoo6.y4QvvmFg45fTj21S3fC48IO','8MH6NCGa7U','Najwa.jpg','Najwa Aulia Sifa',NULL,NULL,'/public/profile/2401-011',NULL,'087872383191','Jl. KarangKemiri, No. 7, Rt. 001/Rw.003, Desa Pengempon, Kec. Sruweng, Kab. Kebumen','SMK Negeri 1 Kawunganten','enabled'),('2401-012','$2y$10$WAYTlWwB9c.WnWA8lgTMsuRltK9BcsB.TuwkTb6iqfOFV01cLakkK','oXs0afUO4t','Purwati.jpg','purwati ningsih',NULL,NULL,'/public/profile/2401-012',NULL,'085725805329','jln cireong RT 08/06 desa rawajaya','SMK Negeri 1 Kawunganten','enabled'),('2401-013','$2y$10$jlhdl0/irV6tcFBFQTqoouzjCw7v1aH/cZpUpt24yrZmMyHLtoICa','NDI7DzddND','Rohayah.jpg','ROHAYAH',NULL,NULL,'/public/profile/2401-013',NULL,'0882003097698','KARANGSARI KAWUNGANTEN RT 03 RW 04','SMK Negeri 1 Kawunganten','enabled'),('2401-014','$2y$10$r4S1KUDh./feedh5YxchTO6hcXoRj3S100bVaybsVJaFW7obwvugu','RkifRby6ia','Sekar.jpg','Sekar Nolo Ratri',NULL,NULL,'/public/profile/2401-014',NULL,'082257975181','Dusun Gunung Sari RT07/RW03','SMK Negeri 1 Kawunganten','enabled'),('2401-015','$2y$10$zXl.IpxfEl.uQay/SE0qBOyZ9Bi0wiQdJTZLWRBDEgM8JfWeTI8Pe','tKuHmFIemg','Siska.jpg','Siska Widi Yuliani',NULL,NULL,'/public/profile/2401-015',NULL,'081228354023','Dusun Sarwatulus, Desa Sarwadadi Rt 03 Rw 04, Kawunganten, Kab. Cilacap, Jawa Tengah','SMK Negeri 1 Kawunganten','enabled'),('2401-016','$2y$10$xlQgIM5WtL8P/LfU1Ri1muqYuWPRaj9VpD9jxtaM4jlWMksC9XVX.','RMhWtpUx5F','Zhara.jpg','ZHARA',NULL,NULL,'/public/profile/2401-016',NULL,'085865305316','DUSUN TEGALANYAR RT06/03 KALIJERUK KAWUNGANTEN CILACAP','SMK Negeri 1 Kawunganten','enabled'),('2401-017','$2y$10$66BxDmJCLHm1J432xqD72.8Pdi7yez9BnqU1H.l1lhoVKjmol/N56','epyGtZX9g1','blank.jpg','Bangkit Anom Sedhayu',NULL,NULL,'/public/profile/2401-017',NULL,'089666385917','Jalan tangkuban perahu no 8 rt 3 rw 10 sidanegara','SMK N 2 Cilacap','enabled'),('2401-018','$2y$10$csYUZYHYjeKL9NT/EnrQquUnVyzq0Wnj0Q5r0dtysPxtIUnSDdNVC','4yEWEwMBki','blank.jpg','Bangkit Anom Sedhayu',NULL,NULL,'/public/profile/2401-018',NULL,'08966638591','Jalan tangkuban perahu no 8 rt 3 rw 10 sidanegara','SMK N 2 Cilacap','enabled');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-09  7:32:15
