use comunidadweb;
CREATE TABLE `Municipio` (
  `ID_Municipio` int PRIMARY KEY AUTO_INCREMENT not null,
  `Nombre_Municipio` varchar(255) not null,
);

CREATE TABLE `Comunidad` (
  `ID_Comunidad` int PRIMARY KEY AUTO_INCREMENT not null,
  `Nombre_Comunidad` varchar(255) not null,
  `Descripcion` text,
  `ID_Municipio` int not null,
   FOREIGN KEY (ID_Municipio) REFERENCES Municipio(ID_Municipio) 
);

CREATE TABLE `Edificios` (
  `ID_Edificio` int PRIMARY KEY not null,
  `Nombre` varchar(255) not null,
  `Descripcion` text not null,
  `Direccion` varchar(255) not null,
   `Tipo_de_edificio` varchar(20) not null,
  `ID_Comunidad` int not null,
    FOREIGN KEY (ID_Comunidad) REFERENCES Comunidad(ID_Comunidad)
);

CREATE TABLE `Celebracion` (
  `ID_Celebracion` int PRIMARY KEY AUTO_INCREMENT not null,
  `Nombre` varchar(255) not null,
  `Descripcion` text not null,
  `Fecha` date not null,
  `ID_Comunidad` int not null,
    FOREIGN KEY (ID_Comunidad) REFERENCES Comunidad(ID_Comunidad)
);

CREATE TABLE `Actividad_Economica` (
  `ID_Actividad` int PRIMARY KEY AUTO_INCREMENT not null,
  `Nombre` varchar(255) not null,
  `Descripcion` text not null,
  `ID_Comunidad` int not null,
    FOREIGN KEY (ID_Comunidad) REFERENCES Comunidad(ID_Comunidad)
);

CREATE TABLE `Produccion` (
  `ID_Produccion` int PRIMARY KEY not null,
  `Nombre` varchar(255) not null,
  `Cantidad` float not null,
  `ID_Actividad` int not null,
   FOREIGN KEY (ID_Actividad) REFERENCES Actividad_Economica(ID_Actividad)
);

CREATE TABLE `Usuario` (
  `ID_Usuario` int PRIMARY KEY AUTO_INCREMENT not null,
  `Nombre` varchar(255) not null,
  `ApellidoP` varchar(255) not null,
  `ApellidoM` varchar(255) not null,
  `FechaNacimiento` date not null,
  `Correo` varchar(255) not null,
  `contrasena` varchar(15) not null,
  `Tipo_Usuario` varchar(20) not null
);
CREATE TABLE `Municipio_Usuario` (
  `ID_Municipio` int not null,
  `ID_Usuario` int not null,
    FOREIGN KEY (ID_Municipio) REFERENCES Municipio(ID_Municipio),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario)
);
CREATE TABLE `Comunidad_Usuario`(
	`ID_Comunidad` int not null,
    `ID_Usuario` int not null,
    FOREIGN KEY (ID_Comunidad) REFERENCES Comunidad(ID_Comunidad),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario)
)