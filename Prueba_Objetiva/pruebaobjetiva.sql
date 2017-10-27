
CREATE TABLE IF NOT EXISTS `oportunidades` (
  `Id_Oportunidad` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) NOT NULL,
  `Rango_Salario` varchar(100) NOT NULL,
  `Detalle` varchar(300) NOT NULL,
  `contacto_email` varchar(50) NOT NULL,
  `Requisitos` varchar(500) NOT NULL,
  `Fecha` date NOT NULL,
  `Imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`Id_Oportunidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `reclutador`
--

CREATE TABLE IF NOT EXISTS `reclutador` (
  `Id_Reclutador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_r` varchar(70) NOT NULL,
  `Apellido_r` varchar(70) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Reclutador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `reclutador`
--

INSERT INTO `reclutador` (`Id_Reclutador`, `Nombre_r`, `Apellido_r`, `correo`, `Pass`) VALUES
(3, 'Admin', 'User', 'Admin@gmail.com', '1234');