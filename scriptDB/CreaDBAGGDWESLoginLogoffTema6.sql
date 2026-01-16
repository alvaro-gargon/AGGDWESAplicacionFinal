/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alvaro.gargon.4
 * Created: 15 dec 2025
 */

-- Creacion de la base de datos
create database if not exists DBAGGDWESProyectoLoginLogoff;
-- me situo en ella
use DBAGGDWESProyectoLoginLogoff;


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

--creo el usuario con todos los privilegios sobre la base de datos
create user if not exists'userAGGDWESProyectoLoginLogoff'@'%' identified by 'paso';
grant all on DBAGGDWESProyectoLoginLogoff.* to 'userAGGDWESProyectoLoginLogoff'@'%' with grant option;
--refrescamos los privilegios para asegurarnos que se ha actualizado
flush privileges;