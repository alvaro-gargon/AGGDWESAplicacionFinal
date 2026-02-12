/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alvaro.gargon.4
 * Created: 15 dec 2025
 */

-- me situo en la base de datos
use DBAGGDWESAplicacionFinal;

-- relleno los campos
insert into T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenDeNegocio,T02_FechaBajaDepartamento) values
        ('AUT','Departamento de automocion.',now(),5235.8,null),
        ('ELE','Departamento de electricidad.',now(),2275.1,null),
        ('MAT','Departamento de matematicas.',now(),735.2,null),
        ('ING','Departamento de ingles.',now(),235.9,'2026-02-17 23:45:37');
-- inserts para ver la paginacion en departamentos
INSERT INTO T02_Departamento VALUES ('AUT', 'Departamento de automoción.', 5235.8, '2026-02-10 10:46:02.000', NULL);
INSERT INTO T02_Departamento VALUES ('INF', 'Departamento de informática.', 8420.3, '2026-03-15 09:12:45.000', '2027-01-10 08:00:00.000');
INSERT INTO T02_Departamento VALUES ('ADM', 'Departamento de administración.', 4120.0, '2026-01-22 14:33:10.000', NULL);
INSERT INTO T02_Departamento VALUES ('FIN', 'Departamento financiero.', 10950.75, '2026-04-01 08:05:55.000', '2026-12-31 23:59:59.000');
INSERT INTO T02_Departamento VALUES ('RRH', 'Departamento de recursos humanos.', 6780.2, '2026-02-28 11:20:30.000', NULL);
INSERT INTO T02_Departamento VALUES ('LOG', 'Departamento de logística.', 7325.9, '2026-05-12 16:44:18.000', '2028-03-01 10:00:00.000');
INSERT INTO T02_Departamento VALUES ('MKT', 'Departamento de marketing.', 5890.4, '2026-03-03 10:10:10.000', NULL);
INSERT INTO T02_Departamento VALUES ('VTA', 'Departamento de ventas.', 12800.0, '2026-06-01 12:00:00.000', '2027-06-01 12:00:00.000');
INSERT INTO T02_Departamento VALUES ('CAL', 'Departamento de calidad.', 4550.6, '2026-07-20 09:45:00.000', NULL);
INSERT INTO T02_Departamento VALUES ('PRD', 'Departamento de producción.', 15230.9, '2026-08-05 06:30:15.000', NULL);
INSERT INTO T02_Departamento VALUES ('ING', 'Departamento de ingeniería.', 9450.3, '2026-02-12 09:15:22.000', NULL);
INSERT INTO T02_Departamento VALUES ('SEG', 'Departamento de seguridad.', 5120.0, '2026-03-01 08:40:10.000', '2027-05-10 12:00:00.000');
INSERT INTO T02_Departamento VALUES ('CMP', 'Departamento de compras.', 6840.9, '2026-01-18 11:22:33.000', NULL);
INSERT INTO T02_Departamento VALUES ('ALM', 'Departamento de almacén.', 4325.7, '2026-04-05 07:55:12.000', NULL);
INSERT INTO T02_Departamento VALUES ('INV', 'Departamento de investigación.', 15890.4, '2026-05-20 10:10:10.000', '2028-01-01 00:00:00.000');
INSERT INTO T02_Departamento VALUES ('SOP', 'Departamento de soporte técnico.', 7250.6, '2026-03-14 13:45:00.000', NULL);
INSERT INTO T02_Departamento VALUES ('PLN', 'Departamento de planificación.', 8120.2, '2026-02-25 09:30:55.000', NULL);
INSERT INTO T02_Departamento VALUES ('DSN', 'Departamento de diseño.', 6785.9, '2026-06-01 15:20:18.000', NULL);
INSERT INTO T02_Departamento VALUES ('PRV', 'Departamento de proveedores.', 5040.3, '2026-01-30 16:10:05.000', '2027-09-15 09:00:00.000');
INSERT INTO T02_Departamento VALUES ('CLT', 'Departamento de atención al cliente.', 5890.0, '2026-03-22 12:12:12.000', NULL);
INSERT INTO T02_Departamento VALUES ('ETR', 'Departamento de estrategia.', 11020.8, '2026-04-18 08:08:08.000', NULL);
INSERT INTO T02_Departamento VALUES ('PRJ', 'Departamento de proyectos.', 9730.5, '2026-05-10 14:55:00.000', NULL);
INSERT INTO T02_Departamento VALUES ('TRN', 'Departamento de formación.', 4550.4, '2026-02-05 10:00:00.000', '2026-11-30 18:00:00.000');
INSERT INTO T02_Departamento VALUES ('DOC', 'Departamento de documentación.', 3820.1, '2026-06-12 09:09:09.000', NULL);
INSERT INTO T02_Departamento VALUES ('EXP', 'Departamento de exportaciones.', 14200.7, '2026-03-28 11:11:11.000', NULL);
INSERT INTO T02_Departamento VALUES ('IMP', 'Departamento de importaciones.', 13850.2, '2026-04-02 07:07:07.000', NULL);
INSERT INTO T02_Departamento VALUES ('TEC', 'Departamento técnico.', 7990.3, '2026-01-12 13:13:13.000', '2027-02-20 10:00:00.000');
INSERT INTO T02_Departamento VALUES ('OBR', 'Departamento de obras.', 9200.9, '2026-05-25 06:30:00.000', NULL);
INSERT INTO T02_Departamento VALUES ('SST', 'Departamento de salud y seguridad.', 6100.4, '2026-02-19 17:45:00.000', NULL);
INSERT INTO T02_Departamento VALUES ('MED', 'Departamento médico.', 7800.0, '2026-03-07 08:20:00.000', '2028-06-01 12:00:00.000');


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

INSERT INTO T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario,T01_Perfil)
                VALUES
                ('admin',SHA2('adminpaso',256),'administrador','administrador')
;