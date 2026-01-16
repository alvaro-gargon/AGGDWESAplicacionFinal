/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alvaro.gargon.4
 * Created: 15 dec 2025
 */


--creamos la tabla sino existe, aunque nunca deberia existir cuando ejecutamos el script
create table if not exists T02_Departamento(
T02_CodDepartamento varchar(3),
T02_DescDepartamento varchar(255),
T02_VolumenDeNegocio float,
T02_FechaCreacionDepartamento datetime,
T02_FechaBajaDepartamento datetime,
primary key(T02_CodDepartamento)
)engine=innodb;

--creamos la tabla sino existe, aunque nunca deberia existir cuando ejecutamos el script
create table if not exists T01_Usuario(
    T01_CodUsuario varchar(25) primary key,
    T01_Password varchar(255),
    T01_DescUsuario varchar(255),
    T01_NumConexiones int default 0,
    T01_FechaHoraUltimaConexion datetime,
    T01_Perfil ENUM('administrador','usuario') default ('usuario'),
    T01_ImagenUsuario blob default null
)engine=innodb;

insert into T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenDeNegocio,T02_FechaBajaDepartamento) values
        ('AUT','Departamento de automocion.',now(),5235.8,null),
        ('ELE','Departamento de electricidad.',now(),2275.1,null),
        ('MAT','Departamento de matematicas.',now(),735.2,null),
        ('ING','Departamento de ingles.',now(),235.9,'2026-02-17 23:45:37');

INSERT INTO T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario,T01_ImagenUsuario)
                VALUES
            ('vero',SHA2('veropaso',256),'Véro Grué',null),
            ('heraclio',SHA2('heracliopaso',256),'Heraclio Borbujo',null),
            ('alvaroA',SHA2('alvaroApaso',256),'Alvaro Allen',null),
            ('alejandro',SHA2('alejandropaso',256),'Alejandro De La Huerga',null),
            ('alvaroG',SHA2('alvaroGpaso',256),'Alvaro García',null),
            ('gonzalo',SHA2('gonzalopaso',256),'Gonzalo Junquera',null),
            ('cristian',SHA2('cristianpaso',256),'Cristian Mateos',null),
            ('alberto',SHA2('albertopaso',256),'Alberto Méndez',null),
            ('enrique',SHA2('enriquepaso',256),'Enrique Nieto',null),
            ('james',SHA2('jamespaso',256),'James Edward Nuñez',null),
            ('oscar',SHA2('oscarpaso',256),'Oscar Pozuelo',null),
            ('jesus',SHA2('jesuspaso',256),'Enrique Nieto',null),
            ('amor',SHA2('amorpaso',256),'Amor Rodriguez',null),
            ('albertoB',SHA2('albertoBpaso',256),'Alberto Bahillo',null),
            ('antonio',SHA2('antoniopaso',256),'Antonio Jañez',null),
            ('jorge',SHA2('jorgepaso',256),'Jorge Corral',null),
            ('claudio',SHA2('claudiopaso',256),'Claudio Lozano',null),
            ('gisela',SHA2('giselapaso',256),'Gisela Folgueral',null)
;

