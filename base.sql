

DROP DATABASE plataformastreaming;

CREATE DATABASE plataformastreaming;
USE plataformaStreaming;


DROP TABLE IF EXISTS peliculas;
CREATE TABLE IF NOT EXISTS peliculas (
  `id` int(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `clasificacion` varchar(10) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `calificacion` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO peliculas (id,nombre,clasificacion,genero,calificacion,tipo) VALUES 
('1','El origen','B15','Ciencia-Ficcion','4','peliculas'),
('2','Avatar','B','Ciencia-Ficcion','3','peliculas'),
('3','Batman: El caballero de la noche','B','Accion','4','peliculas'),
('4','Guason','B15','Drama','4','peliculas'),
('5','Bastardos sin gloria','B15','Belico','3','peliculas'),
('6','Interestelar','A','Ciencia-Ficcion','3','peliculas'),
('7','El cisne negro','B15','Drama','3','peliculas'),
('8','Gran Torino','C','Drama','4','peliculas'),
('9','Quisiera ser millonario','B15','Drama','3','peliculas'),
('10','Django sin cadenas','B15','Drama','4','peliculas'),
('11','La La Land','A','Romance','3','peliculas'),
('12','Los infiltrados','C','Drama','3','peliculas'),
('13','El secreto de sus ojos','A','Romance','4','peliculas'),
('14','La provocacion','B15','Romance','3','peliculas'),
('15','El curioso caso de Bejamin Button','A','Romance','3','peliculas'),
('16','WALL-E','AA','Infantil','3','peliculas'),
('17','Up, una aventura de altura','AA','Infantil','3','peliculas'),
('18','Celda 211','D','Drama','3','peliculas'),
('19','La vida de los otros','B','Drama','4','peliculas'),
('20','La isla siniestra','B','Drama','3','peliculas'),
('21','Toy story 3','AA','Infantil','3','peliculas'),
('22','Alto impacto','B15','Accion','3','peliculas'),
('23','El lobo de Wall Street','D','Comedia','3','peliculas'),
('24','Gravedad','A','Ciencia-Ficcion','3','peliculas'),
('25','Habia una vez en Hollywood','D','Drama','3','peliculas'),
('26','1917','C','Belico','3','peliculas'),
('27','300','B15','Belico','3','peliculas'),
('28','El laberinto del fauno','B','Ciencia-Ficcion','3','peliculas'),
('29','Parasitos','A','Drama','4','peliculas'),
('30','Babel','C','Drama','3','peliculas');



DROP TABLE IF EXISTS series;
CREATE TABLE IF NOT EXISTS series (
  `id` int(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `clasificacion` varchar(10) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `calificacion` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO series (id,nombre,clasificacion,genero,calificacion,tipo) VALUES 
('1','Juego de tronos','D','Drama','4','series'),
('2','Breaking Bad','D','Drama','4','series'),
('3','Vikingos','D','Belico','3','series'),
('4','Hijos de la anarquia','C','Drama','3','series'),
('5','Outlander','B15','Romance','3','series'),
('6','Chernobyl','B15','Drama','4','series'),
('7','Los sopranos','C','Drama','5','series'),
('8','Sobrenatural','C','Terror','4','series'),
('9','Los Originales','B15','Terror','4','series'),
('10','The Good Doctor','A','Drama','3','series'),
('11','Sherlock','B12','Drama','4','series'),
('12','Stranger Things','B15','Drama','4','series'),
('13','Peaky Blinders','B','Belico','3','series'),
('14','Los Simpson','B','Comedia','3','series'),
('15','BEAT','B15','Drama','4','series'),
('16','Hermanos de sangre','B15','Drama','4','series'),
('17','Big Bang','A','Comedia','4','series'),
('18','Erkenci Kus','B','Comedia','4','series'),
('19','Dark','C','Ciencia-Ficcion','4','series'),
('20','Friends','B','Comedia','4','series'),
('21','Dexter','B15','Drama','4','series'),
('22','Teen Wolf','B15','Drama','4','series'),
('23','Amor en blanco y negro','B15','Romance','3','series'),
('24','The walking dead','C','Terror','3','series'),
('25','House','C','Drama','4','series'),
('26','Riverdale','B15','Drama','4','series'),
('27','Te alquilo mi amor','C','Romance','3','series'),
('28','Spartacus: sangre y arena','C','Drama','3','series'),
('29','Perdidos','C','Accion','4','series'),
('30','Downton Abbey','C','Belico','3','series');

DROP TABLE IF EXISTS cuenta_principal;
CREATE TABLE IF NOT EXISTS cuenta_principal (
  `idPrincipal` int(9) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL UNIQUE,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `clasificacion` varchar(10) NOT NULL,
  `imagen` int(10) NOT NULL,
  `noPerfiles` int(10) NOT NULL,
  PRIMARY KEY (`idPrincipal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS cuenta_familiar;
CREATE TABLE IF NOT EXISTS cuenta_familiar (
  `idPerfil` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `clasificacion` varchar(10) NOT NULL,
  `imagen` int(10) NOT NULL,
  `idPrincipal` int(9) NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table entretenimiento as select * from peliculas union all select * from series order by id;