
DROP TABLE IF EXISTS `instancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancia` (
  `idInstancia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idInstancia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancia`
--

LOCK TABLES `instancia` WRITE;
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */;
INSERT INTO `instancia` VALUES (1,'Inicio Tramite'),(2,'Verficación Documentación'),(3,'Dictaminar Junta médica'),(4,'Apertura Proyecto'),(5,'Revisión Asuntos Jurídicos'),(6,'Suscripcion Proyecto'),(7,'Cerrar trámite'),(8,'Aviso al Solicitante Resolucion Final\r\n');
/*!40000 ALTER TABLE `instancia` ENABLE KEYS */;
UNLOCK TABLES;